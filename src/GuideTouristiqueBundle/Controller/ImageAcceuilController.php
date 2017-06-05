<?php

namespace GuideTouristiqueBundle\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ImageAcceuilController extends Controller
{

    const SERVICENAME = 's.image_acceuil.impmetier';


    /**
     * @Rest\Post("/addImageAcceuil")
     * @param Request $request
     * @return JsonResponse
     */
    public function addImageAcceuilAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);


        $serviceImageAcceuil = $this->get(self::SERVICENAME);

        $image = $serviceImageAcceuil->addImageAcceuil($data);

        return new JsonResponse('ok');
    }


    /**
     *
     * @Rest\Put("/updateImageAcceuil")
     */
    public function updateImageAcceuilAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $serviceImageAcceuil = $this->get(self::SERVICENAME);
        $serviceImageAcceuil->updateImageAcceuil($data);


        return new JsonResponse('ok');
    }

    /**
     * @Rest\Delete("/deleteImageAcceuil/{idImageAcceuil}")
     */
    public function deleteImageAcceuilAction(Request $request)
    {
        $serviceImageAcceuil = $this->get(self::SERVICENAME);
        $serviceImageAcceuil->deleteImageAcceuil($request->get('idImageAcceuil'));


        return new JsonResponse("success");
    }


    /**
     * @Rest\Get("/getAllImagesAcceuil")
     */
    public function getAllImagesAcceuilAction()
    {
        $serviceImageAcceuil = $this->get(self::SERVICENAME);
        $images = $serviceImageAcceuil->getAllImagesAcceuil();


        $imagesJson = Serialiser::serializer($images);

        return new JsonResponse($imagesJson);

    }


    /**
     * @Rest\Get("/getAllImagesSlideShow")
     */
    public function getAllImagesSlideShowAction()
    {
        $serviceImageAcceuil = $this->get(self::SERVICENAME);
        $images = $serviceImageAcceuil->getAllImagesSlideShow();


        $imagesJson = Serialiser::serializer($images);

        return new JsonResponse($imagesJson);

    }


    /**
     * @Rest\Get("/getImageAcceuil/{idImageAcceuil}")
     */
    public function getImageAcceuilAction(Request $request)
    {
        $serviceImageAcceuil = $this->get(self::SERVICENAME);
        $image = $serviceImageAcceuil->getImageAcceuil($request->get('idImageAcceuil'));

        $imageJson = Serialiser::serializer($image);
        return new JsonResponse($imageJson);
    }

}
