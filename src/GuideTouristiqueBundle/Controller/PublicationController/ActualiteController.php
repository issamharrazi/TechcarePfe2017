<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 12:54
 */

namespace GuideTouristiqueBundle\Controller\PublicationController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ActualiteController extends Controller
{
    const SERVICENAME = 's.actualite.impmetier';

    /**
     * @Rest\Post("/addActuality")
     * @param Request $request
     * @return JsonResponse
     */
    public function addActualityAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->addActualite($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/updateActuality")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateActualityAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->updateActuality($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllActualities")
     * @return JsonResponse
     */
    public function getAllActualitiesAction()
    {


        $serviceActuality = $this->get(self::SERVICENAME);
        $Actualities = $serviceActuality->getAllActualites();

        $ActualitiesJson = Serialiser::serializer($Actualities);

        return new JsonResponse($ActualitiesJson);

    }

    /**
     * @Rest\Get("/getActivatedActualities")
     * @return JsonResponse
     */
    public function getActivatedActualitiesAction()
    {


        $serviceActuality = $this->get(self::SERVICENAME);
        $Actualities = $serviceActuality->findAllActivatedActualites();

        $ActualitiesJson = Serialiser::serializer($Actualities);

        return new JsonResponse($ActualitiesJson);

    }


    /**
     * @Rest\Get("/getActuality/{idActuality}")
     */
    public function getActualityAction(Request $request)
    {
        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->getActualite($request->get('idActuality'));

        $ActualityJson = Serialiser::serializer($Actuality);
        return new JsonResponse($ActualityJson);


    }


    /**
     * @Rest\Delete("/deleteActuality/{idActuality}")
     */
    public function deleteActualityAction(Request $request)
    {
        $serviceActuality = $this->get(self::SERVICENAME);
        $serviceActuality->deleteActuality($request->get('idActuality'));


        return new JsonResponse('success');
    }


}