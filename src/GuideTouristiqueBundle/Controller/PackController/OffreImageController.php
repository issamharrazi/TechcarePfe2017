<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 22:27
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OffreImageController extends Controller
{
    const SERVICENAME = 's.offre_image.impmetier';


    /**
     * @Rest\Post("/addPictureDeal")
     * @param Request $request
     * @return JsonResponse
     */
    public function addPictureDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffreImg = $this->get(self::SERVICENAME);
        $offreImg = $serviceOffreImg->addOffreImage($data);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Get("/getPictureDeals")
     * @return JsonResponse
     */
    public function getPictureDealsAction()
    {
        $serviceOffreImg = $this->get(self::SERVICENAME);
        $offresImg = $serviceOffreImg->getAllOffreImage();

        $offresImgJson = Serialiser::serializer($offresImg);

        return new JsonResponse($offresImgJson);
    }


    /**
     * @Rest\Get("/getActivatedPictureDeals")
     * @return JsonResponse
     */
    public function getActivatedPictureDealsAction()
    {
        $serviceOffreImg = $this->get(self::SERVICENAME);
        $offresImg = $serviceOffreImg->findAllActivatedOffreImage();

        $offresImgJson = Serialiser::serializer($offresImg);

        return new JsonResponse($offresImgJson);
    }

    /**
     * @Rest\Get("/getPictureDeal/{idDeal}")
     * @return JsonResponse
     */
    public function getPictureDeal(Request $request)
    {


        $serviceOffreImg = $this->get(self::SERVICENAME);
        $offreImg = $serviceOffreImg->getOffreImage($request->get('idDeal'));

        $offreImgJson = Serialiser::serializer($offreImg);

        return new JsonResponse($offreImgJson);

    }


    /**
     *
     * @Rest\Put("/updatePictureDeal")
     */
    public function updatePictureDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffreImg = $this->get(self::SERVICENAME);

        $offreImg = $serviceOffreImg->updateOffreImage($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Delete("/deletePictureDeal/{idDeal}")
     */
    public function deletePictureDealAction(Request $request)
    {
        $serviceOffreImg = $this->get(self::SERVICENAME);
        $serviceOffreImg->deleteOffreImage($request->get('idDeal'));


        return new JsonResponse("success");
    }


}