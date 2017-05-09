<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 18:24
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{


    const SERVICENAME = 's.categorie.impmetier';

    /**
     * @Rest\Post("/addCategorieCPack")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCategorieCPackAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceCategorie = $this->get(self::SERVICENAME);
        $categorie = $serviceCategorie->addCategorie($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/updateCategorieCPack")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateCategorieCPackAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceCategorie = $this->get(self::SERVICENAME);
        $categorie = $serviceCategorie->updateCategorie($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllCategoriesCPack")
     * @return JsonResponse
     */
    public function getAllCategoriesCPackAction()
    {


        $serviceCategorie = $this->get(self::SERVICENAME);
        $categories = $serviceCategorie->getAllCategorie();

        $categoriesJson = Serialiser::serializer($categories);

        return new JsonResponse($categoriesJson);

    }

    /**
     * @Rest\Get("/getActivatedCategoriesCPack")
     * @return JsonResponse
     */
    public function getActivatedCategoriesCPackAction()
    {


        $serviceCategorie = $this->get(self::SERVICENAME);
        $categories = $serviceCategorie->findAllActivatedCategories();

        $categoriesJson = Serialiser::serializer($categories);

        return new JsonResponse($categoriesJson);

    }


    /**
     * @Rest\Get("/getCategorieCPack/{numCPack}")
     */
    public function getCategorieCPackAction(Request $request)
    {
        $serviceCategorie = $this->get(self::SERVICENAME);
        $categorie = $serviceCategorie->getCategorieByNum($request->get('numCPack'));

        $categorieJson = Serialiser::serializer($categorie);
        return new JsonResponse($categorieJson);


    }


    /**
     * @Rest\Delete("/deleteCategorieCPack/{idCatCPack}")
     */
    public function deleteCategoriePackAction(Request $request)
    {
        $serviceCategorie = $this->get(self::SERVICENAME);
        $serviceCategorie->deleteCategorie($request->get('idCatCPack'));


        return new JsonResponse('success');
    }



    /*
        /**
         * @Route("/")
         */

    /* public function indexAction()
       {



          // $data = ['nom' => 'CpackFicheTechnique', 'description' => 'le client doit ecrire les dettablissemet','num' =>1];

           //$data = ['nom' => 'CpackImageIMetier', 'description' => 'le client doit ecrire les dettablissemet','num' =>2];
          // $data = ['nom' => 'CpackVideo', 'description' => 'le client doit ecrire les dettablissemet','num' =>3];
         // $data = ['nom' => 'CpackVisiteVirtuelle', 'description' => 'le client doit ecrire les dettablissemet','num' =>4];
           $data = ['nom' => 'CpackPublicite', 'description' => 'le client doit ecrire les dettablissemet','num' =>5];


           $serviceCategorie = $this->get('s.categorie.impmetier');


        //   $categoriesJson = $serviceCategorie->getAllCategorie();

          // var_dump($categoriesJson );
           $serviceCategorie->addCategorie($data);


           return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
       }

  */

}