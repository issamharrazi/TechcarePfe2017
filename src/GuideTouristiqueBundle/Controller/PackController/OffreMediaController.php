<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 10:43
 */

namespace GuideTouristiqueBundle\Controller\PackController;


use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OffreMediaController extends Controller
{

    const SERVICENAME = 's.offreMedia.impmetier';


    /**
     * @Rest\Post("/addOffreMedia")
     * @param Request $request
     * @return JsonResponse
     */
    public function addOffreMediaAction(Request $request)
    {

        //   $data = json_decode($request->getContent(), true);

        $serviceOffreMedia = $this->get(self::SERVICENAME);
        $offreMedia = $serviceOffreMedia->addOffreMedia($request->getContent());

        return new JsonResponse($offreMedia);
    }


    /**
     * @Rest\Get("/getAllOffresMedia")
     * @return JsonResponse
     */
    public function getAllOffresMediaAction()
    {


        $serviceOffreMedia = $this->get(self::SERVICENAME);
        $offresMedia = $serviceOffreMedia->getAllOffreMedia();

        $offresMediaJson = Serialiser::serializer($offresMedia);

        return new JsonResponse($offresMediaJson);

    }


    /**
     *
     * @Rest\Put("/updateOffreMedia")
     */
    public function updateOffreMediaAction(Request $request)
    {

        $serviceOffreMedia = $this->get(self::SERVICENAME);

        $serviceOffreMedia->updateOffreMedia($request->getContent());


        return new JsonResponse("sucess");
    }


    /**
     * @Rest\Delete("/deleteOffreMedia/{idFOffreMedia}")
     */
    public function deleteOffreMediaAction(Request $request)
    {
        $serviceOffreMedia = $this->get(self::SERVICENAME);
        $serviceOffreMedia->deleteOffreMedia($request->get('idOffreMedia'));


        return new JsonResponse("success");
    }

    /*
          /**
          * @Route("/")
          */

    /*     public function indexAction()
          {

                //$id="3";


              $data = ['nbre_media' => 10 , 'nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];


              $serviceOffreMedia = $this->get(self::SERVICENAME);

            //  $serviceOffre->updateOffre($data);

              $offreMedia = $serviceOffreMedia->addOffreMedia($data);
            //  dump('controller',$offre);
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