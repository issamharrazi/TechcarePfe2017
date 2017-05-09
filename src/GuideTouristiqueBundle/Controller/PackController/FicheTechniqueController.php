<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 00:35
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FicheTechniqueController extends Controller
{


    const SERVICENAME = 's.fiche_technique.impmetier';


    /**
     * @Rest\Post("/addFicheTechnique")
     * @param Request $request
     * @return JsonResponse
     */
    public function addFicheTechniqueAction(Request $request)
    {

        //   $data = json_decode($request->getContent(), true);

        $serviceFicheTechnique = $this->get(self::SERVICENAME);
        $ficheTechnique = $serviceFicheTechnique->addFicheTechnique($request->getContent());

        return new JsonResponse($ficheTechnique);
    }

    /**
     * @Rest\Get("/getAllFicheTechniques")
     * @return JsonResponse
     */
    public function getAllFicheTechniquesAction()
    {


        $serviceFicheTechnique = $this->get(self::SERVICENAME);
        $ficheTechniques = $serviceFicheTechnique->getAllFicheTechnique();
        $ficheTechniquesJson = Serialiser::serializer($ficheTechniques);

        return new JsonResponse($ficheTechniquesJson);

    }

    /**
     *
     * @Rest\Put("/updateFicheTechnique")
     */
    public function updateFicheTechniqueAction(Request $request)
    {

        $serviceFicheTechnique = $this->get(self::SERVICENAME);

        $serviceFicheTechnique->updateFicheTechnique($request->getContent());


        return new JsonResponse("sucess");
    }


    /**
     * @Rest\Delete("/deleteFicheTechnique/{idFicheTechnique}")
     */
    public function deleteFicheTechniqueAction(Request $request)
    {
        $serviceFicheTechnique = $this->get(self::SERVICENAME);
        $serviceFicheTechnique->deleteFicheTechnique($request->get('idFicheTechnique'));


        return new JsonResponse("success");
    }
    /*

           /**
             * @Route("/")
             */

    /*     public function indexAction()
            {

              //  $id="3";


               // $data = ["nom" => "CpackFicheTechnique", "description" => "le client doit ecrire les details techniques de so etablissemet","num" =>1];

                //$etat = ['id' => '2' , 'nom' => 'Desactive'];
                $data = ["description"=> "harrazi5"];

                $serviceFicheTechnique = $this->get(self::SERVICENAME);

                $data = $serviceFicheTechnique->addFicheTechnique($data);
              // $serviceFicheTechnique->updateFicheTechnique($data);

              //  $serviceFicheTechnique ->deleteFicheTechnique($id);
              //  $ficheTechniquesJson = $serviceFicheTechnique->getAllFicheTechnique();

             //   dump($ficheTechniquesJson);
                return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
            }
   */

}