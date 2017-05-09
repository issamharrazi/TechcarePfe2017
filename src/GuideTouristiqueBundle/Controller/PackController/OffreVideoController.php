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

class OffreVideoController extends Controller
{

    const SERVICENAME = 's.offre_video.impmetier';


    /**
     * @Rest\Post("/addVideoDeal")
     * @param Request $request
     * @return JsonResponse
     */
    public function addVideoDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffreVid = $this->get(self::SERVICENAME);
        $offreVid = $serviceOffreVid->addOffreVideo($data);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Get("/getVideoDeals")
     * @return JsonResponse
     */
    public function getVideoDealsAction()
    {
        $serviceOffreVid = $this->get(self::SERVICENAME);
        $offresVid = $serviceOffreVid->getAllOffreVideo();

        $offresVidJson = Serialiser::serializer($offresVid);

        return new JsonResponse($offresVidJson);
    }


    /**
     * @Rest\Get("/getActivatedVideoDeals")
     * @return JsonResponse
     */
    public function getActivatedVideoDealsAction()
    {
        $serviceOffreVid = $this->get(self::SERVICENAME);
        $offresVid = $serviceOffreVid->findAllActivatedOffreVideo();

        $offresVidJson = Serialiser::serializer($offresVid);

        return new JsonResponse($offresVidJson);
    }

    /**
     * @Rest\Get("/getVideoDeal/{idDeal}")
     * @return JsonResponse
     */
    public function getVideoDeal(Request $request)
    {


        $serviceOffrevid = $this->get(self::SERVICENAME);
        $offrevid = $serviceOffrevid->getOffreVideo($request->get('idDeal'));

        $offresvidJson = Serialiser::serializer($offrevid);

        return new JsonResponse($offresvidJson);

    }


    /**
     *
     * @Rest\Put("/updateVideoDeal")
     */
    public function updateVideoDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffreVid = $this->get(self::SERVICENAME);

        $offreVid = $serviceOffreVid->updateOffreVideo($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Delete("/deleteVideoDeal/{idDeal}")
     */
    public function deleteVideoDealAction(Request $request)
    {
        $serviceOffreVid = $this->get(self::SERVICENAME);
        $serviceOffreVid->deleteOffreVideo($request->get('idDeal'));


        return new JsonResponse("success");
    }


}