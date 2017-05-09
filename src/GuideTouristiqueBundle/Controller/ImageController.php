<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 01:20
 */

namespace GuideTouristiqueBundle\Controller;


use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class ImageController extends Controller
{
    const SERVICENAME = 's.image.impmetier';


    /**
     * @Rest\Post("/addImage")
     * @param Request $request
     * @return JsonResponse
     */
    public function addImageAction(Request $request)
    {


        // $data = json_decode($requestContent, true);


        $serviceImage = $this->get(self::SERVICENAME);

        $image = $serviceImage->addImage($request->getContent());

        return new JsonResponse($image);
    }


    /**
     *
     * @Rest\Put("/updateImage")
     */
    public function updateImageAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $serviceImage = $this->get(self::SERVICENAME);
        $serviceImage->updateImage($data);


        return new JsonResponse('ok');
    }

    /**
     * @Rest\Delete("/deleteImage/{idImage}")
     */
    public function deleteImageAction(Request $request)
    {
        $serviceImage = $this->get(self::SERVICENAME);
        $serviceImage->deleteImage($request->get('idImage'));


        return new JsonResponse("success");
    }


    /**
     * @Rest\Get("/getAllImages")
     */
    public function getAllImagesAction()
    {
        $serviceImage = $this->get(self::SERVICENAME);
        $images = $serviceImage->getAllImages();


        $imagesJson = Serialiser::serializer($images);

        return new JsonResponse($imagesJson);

    }


    /**
     *
     * @Rest\Get("/getImage/{idImage")
     */
    public function getImageAction(Request $request)
    {
        $serviceImage = $this->get(self::SERVICENAME);
        $image = $serviceImage->getImage($request->get('idImage'));

        $imageJson = Serialiser::serializer($image);
        return new JsonResponse($imageJson);
    }


    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $serviceImage = $this->get(self::SERVICENAME);
        $images = $serviceImage->getAllImages();


        // $imagesJson= Serialiser::serializer($images);


        return $this->render('GuideTouristiqueBundle:Default:index.html.twig', array('form' => $images));
    }
}