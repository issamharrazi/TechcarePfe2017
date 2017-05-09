<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 07/05/2017
 * Time: 00:13
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class OffrePubliciteController extends Controller
{
    const SERVICENAME = 's.offre_publicite.impmetier';

    /**
     * @Rest\Post("/addAdvertisementDeal")
     * @param Request $request
     * @return JsonResponse
     */
    public function addAdvertisementDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffrePub = $this->get(self::SERVICENAME);
        $offrePub = $serviceOffrePub->addOffrePublicite($data);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Get("/getAdvertisementDeals")
     * @return JsonResponse
     */
    public function getAdvertisementDealsAction()
    {
        $serviceOffrePub = $this->get(self::SERVICENAME);
        $offresPub = $serviceOffrePub->getAllOffrePublicite();

        $offresPubJson = Serialiser::serializer($offresPub);

        return new JsonResponse($offresPubJson);
    }


    /**
     * @Rest\Get("/getActivatedAdvertisementDeals")
     * @return JsonResponse
     */
    public function getActivatedAdvertisementDealsAction()
    {
        $serviceOffrePub = $this->get(self::SERVICENAME);
        $offresPub = $serviceOffrePub->findAllActivatedOffrePublicite();

        $offresPubJson = Serialiser::serializer($offresPub);

        return new JsonResponse($offresPubJson);
    }


    /**
     * @Rest\Get("/getAdvertisementDeal/{idDeal}")
     * @return JsonResponse
     */
    public function getAdvertisementDealAction(Request $request)
    {


        $serviceOffrePub = $this->get(self::SERVICENAME);
        $offrePub = $serviceOffrePub->getOffrePublicite($request->get('idDeal'));

        $offresPubJson = Serialiser::serializer($offrePub);

        return new JsonResponse($offresPubJson);

    }


    /**
     *
     * @Rest\Put("/updateAdvertisementDeal")
     */
    public function updateAdvertisementDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffrePub = $this->get(self::SERVICENAME);

        $offrePub = $serviceOffrePub->updateOffrePublicite($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Delete("/deleteAdvertisementDeal/{idDeal}")
     */
    public function deleteAdvertisementDealAction(Request $request)
    {
        $serviceOffrePub = $this->get(self::SERVICENAME);
        $serviceOffrePub->deleteOffrePublicite($request->get('idDeal'));


        return new JsonResponse("success");
    }


}