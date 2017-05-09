<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:38
 */

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends Controller
{
    const SERVICENAME = 's.video.impmetier';

    /**
     * @Rest\Post("/addVideo")
     * @param Request $request
     * @return JsonResponse
     */
    public function addVideoAction(Request $request)
    {


        // $data = json_decode($requestContent, true);


        $serviceVideo = $this->get(self::SERVICENAME);

        $video = $serviceVideo->addVideo($request->getContent());

        return new JsonResponse($video);
    }


    /**
     *
     * @Rest\Put("/updateVideo")
     */
    public function updateVideoAction(Request $request)
    {
        //     $data = json_decode($requestContent, true);$data = $requestContent;
        $serviceVideo = $this->get(self::SERVICENAME);
        $serviceVideo->updateVideo($request->getContent());


        return new JsonResponse("sucess");
    }


    /**
     * @Rest\Delete("/deleteVideo/{idVideo}")
     */
    public function deleteVideoAction(Request $request)
    {
        $serviceVideo = $this->get(self::SERVICENAME);
        $serviceVideo->deleteVideo($request->get('idVideo'));


        return new JsonResponse("success");
    }


    /**
     * @Rest\Get("/getAllVideos")
     */
    public function getAllVideosAction()
    {


        $serviceVideo = $this->get(self::SERVICENAME);
        $videos = $serviceVideo->getAllVideos();


        $videosJson = Serialiser::serializer($videos);

        return new JsonResponse($videosJson);

    }


    /**
     *
     * @Rest\Get("/getVideo/{idVideo")
     */
    public function getVideoAction(Request $request)
    {
        $serviceVideo = $this->get(self::SERVICENAME);
        $video = $serviceVideo->getVideo($request->get('idVideo'));

        $videoJson = Serialiser::serializer($video);
        return new JsonResponse($videoJson);
    }


    /*

       /**
        * @Route("/")
        */
    /*   public function indexAction(Request $request)
         {
             $form = $this->createFormBuilder(array())
                 ->add('upload','file')
                 ->add('save','submit')
                 ->getForm();


             if ($request->isMethod('POST')) {
                 $form->bind($request);

                 $data = $form->getData();

                 $upload = $data['upload'];


                 $x = ['mimeType' => $upload->getClientMimeType(),'video' => $upload->getPathname(),'videoName' => $upload->getClientOriginalName()];

                 $serviceVideo = $this->get(self::SERVICENAME);

                $video= $serviceVideo->addVideo($x);




             }


             return $this->render('GuideTouristiqueBundle:Default:index.html.twig',array('form' => $form->createView()));
         }


  */

}