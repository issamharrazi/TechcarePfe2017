<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 20:15
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CpackVideoController extends Controller
{

    const SERVICENAME = 's.cpack_video.impmetier';


    /**
     * @Rest\Post("/addCpackVideo")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCpackVideoAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceCpackVideo = $this->get(self::SERVICENAME);
        $cpackVideo = $serviceCpackVideo->addCpackVideo($data[0]);

        return new JsonResponse('ok');
    }


    /*

          /**
           * @Route("/")
           */
    /*     public function indexAction(Request $request)
         {

             //$id="3";



             $form = $this->createFormBuilder(array())
                 ->add('upload','file')

                 ->add('save','submit')

                 ->getForm();


                 $form->bind($request);

                 $data = $form->getData();

                 $upload = $data['upload'];


                 $videos = [["video" => $upload->getPathname(),"videoName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()],
                     ["video" => $upload->getPathname(),"videoName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()]
                 ];


                 $offreMedia = ['id' =>'1','nbre_media' => 10 ,'nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];

                 $data = ['offreMedia' => $offreMedia , 'videos' => $videos];

                 $serviceCpackVideo = $this->get(self::SERVICENAME);
                 $serviceCpackVideo->addCpackVideo($data);











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