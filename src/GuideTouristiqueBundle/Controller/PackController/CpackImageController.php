<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 19:04
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CpackImageController extends Controller
{
    const SERVICENAME = 's.cpack_image.impmetier';


    /**
     * @Rest\Post("/addCpackImage")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCpackImageAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceCpackImage = $this->get(self::SERVICENAME);
        $cpackImage = $serviceCpackImage->addCpackImage($data[0]);
        $etatsJson = Serialiser::serializer($cpackImage);

        return new JsonResponse($etatsJson);
    }


    /*  /**
       * @Route("/")
       */
    /*  public function indexAction(Request $request)
      {

          //$id="3";



          $form = $this->createFormBuilder(array())
              ->add('upload','file')

              ->add('save','submit')

              ->getForm();


              $form->bind($request);

              $data = $form->getData();

              $upload = $data['upload'];


              $images = [["alt" => "image1 hhh","image" => $upload->getPathname(),"imageName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()],
                  ["alt" => "image1 hhh","image" => $upload->getPathname(),"imageName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()]
              ];


              $offreMedia = ['id' =>'1','nbre_media' => 10 ,'nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];

              $data = ['offreMedia' => $offreMedia , 'images' => $images];

              $serviceCpackImage = $this->get(self::SERVICENAME);
              $serviceCpackImage->addCpackImage($data);











          //$serviceOffre = $this->get(self::SERVICENAME);

        //  $serviceOffre->updateOffre($data);

          // $serviceOffre->addOffre($data);
        //  $serviceOffre ->deleteOffre($id);
         // $offresJson = $serviceOffre ->getAllOffre();

          //  $serviceFicheTechnique->updateFicheTechnique($data);

          //  $serviceFicheTechnique ->deleteFicheTechnique($id);
          // $ficheTechniquesJson = $serviceFicheTechnique->getAllFicheTechnique();

        //  dump($offresJson);
          return $this->render('GuideTouristiqueBundle:Default:index.html.twig',array('form' => $form->createView()));
      }


*/
}