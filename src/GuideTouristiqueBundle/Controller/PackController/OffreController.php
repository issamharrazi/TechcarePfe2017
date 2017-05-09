<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:39
 */

namespace GuideTouristiqueBundle\Controller\PackController;


use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OffreController extends Controller
{


    const SERVICENAME = 's.offre.impmetier';


    /**
     * @Rest\Post("/addOffre")
     * @param Request $request
     * @return JsonResponse
     */
    public function addOffreAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffre = $this->get(self::SERVICENAME);
        $offre = $serviceOffre->addOffre($data);

        return new JsonResponse($offre);
    }


    /**
     * @Rest\Get("/getAllOffres")
     * @return JsonResponse
     */
    public function getAllOffresAction()
    {


        $serviceOffre = $this->get(self::SERVICENAME);
        $offres = $serviceOffre->getAllOffre();

        $offresJson = Serialiser::serializer($offres);

        return new JsonResponse($offresJson);

    }


    /**
     * @Rest\Get("/getOffre/{idOffre}")
     * @return JsonResponse
     */
    public function getOffreAction(Request $request)
    {


        $serviceOffre = $this->get(self::SERVICENAME);
        $offre = $serviceOffre->getOffre($request->get('idOffre'));

        $offreJson = Serialiser::serializer($offre);

        return new JsonResponse($offreJson);

    }


    /**
     *
     * @Rest\Put("/updateOffre")
     */
    public function updateOffreAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffre = $this->get(self::SERVICENAME);

        $serviceOffre->updateOffre($data);


        return new JsonResponse('succes');
    }

    /**
     * @Rest\Delete("/deleteOffre/{idOffre}")
     */
    public function deleteOffreAction(Request $request)
    {
        $serviceOffre = $this->get(self::SERVICENAME);
        $serviceOffre->deleteOffre($request->get('idOffre'));


        return new JsonResponse("success");
    }
    /*

         /**
         * @Route("/")
         */
    /*
        public function indexAction()
        {

              //$id="3";


            $data = ['nom' => 'issam', 'description' => 'cette offre permet d\'avoir le pack fiche technique pendant 2 mois avec le prix de 1.5 $ ' , 'prix' => 1.5, 'duree' => 123];


            $serviceOffre = $this->get(self::SERVICENAME);

          //  $serviceOffre->updateOffre($data);

            $offre = $serviceOffre->addOffre($data);
            dump('controller',$offre);
         //   $serviceOffre ->deleteOffre($id);
          //   $offresJson = $serviceOffre ->getAllOffre();

          //  $serviceFicheTechnique->updateFicheTechnique($data);

            //  $serviceFicheTechnique ->deleteFicheTechnique($id);
           // $ficheTechniquesJson = $serviceFicheTechnique->getAllFicheTechnique();

          // dump($offresJson);
            return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
        }
    */

}