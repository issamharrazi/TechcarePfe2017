<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 22:10
 */

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\Document\Media;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class DeviseController extends Controller
{

    const SERVICENAME = 's.devise.impmetier';

    /**
     * @Rest\Post("/addCurrency")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCurrencyAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceDevise = $this->get(self::SERVICENAME);
        $devise = $serviceDevise->addDevise($data);

        //$devisesJson= Serialiser::serializer($devise);

        return new JsonResponse('ok');
    }



    /**
     * @Rest\Put("/updateCurrency")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateDeviseAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceDevise = $this->get(self::SERVICENAME);
        $devise = $serviceDevise->updateDevise($data);



        return new JsonResponse('success');
    }



    /**
     * @Rest\Get("/getAllCurrencies")
     * @return JsonResponse
     */
    public function getAllCurrenciesAction()
    {


        $serviceDevise = $this->get(self::SERVICENAME);
        $devises = $serviceDevise->getAllDevise();

        $devisesJson = Serialiser::serializer($devises);

        return new JsonResponse($devisesJson);

    }


    /**
     * @Rest\Get("/getActivatedCurrencies")
     * @return JsonResponse
     */
    public function getActivatedCurrenciesAction()
    {


        $serviceDevise = $this->get(self::SERVICENAME);
        $devises = $serviceDevise->findAllActivatedDevise();

        $devisesJson = Serialiser::serializer($devises);

        return new JsonResponse($devisesJson);

    }


    /**
     * @Rest\Get("/getCurrency/{idDevise}")
     */
    public function getDeviseAction(Request $request)
    {
        $serviceDevise = $this->get(self::SERVICENAME);
        $devise = $serviceDevise->getDevise($request->get('idDevise'));

        $deviseJson = Serialiser::serializer($devise);
        return new JsonResponse($deviseJson);


    }


    /**
     * @Rest\Delete("/deleteCurrency/{idDevise}")
     */
    public function deleteDevise(Request $request)
    {
        $serviceDevise = $this->get(self::SERVICENAME);
        $serviceDevise->deleteDevise($request->get('idDevise'));


        return new JsonResponse('success');
    }


}