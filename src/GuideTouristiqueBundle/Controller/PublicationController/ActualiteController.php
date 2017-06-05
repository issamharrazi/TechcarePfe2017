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
     * @Rest\Post("/addNews")
     * @param Request $request
     * @return JsonResponse
     */
    public function addNewsAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->addActualite($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/updateNews")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateNewsAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->updateActualite($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllNews")
     * @return JsonResponse
     */
    public function getAllNewsAction()
    {


        $serviceActuality = $this->get(self::SERVICENAME);
        $Actualities = $serviceActuality->getAllActualites();

        $ActualitiesJson = Serialiser::serializer($Actualities);

        return new JsonResponse($ActualitiesJson);

    }

    /**
     * @Rest\Get("/getActivatedNews")
     * @return JsonResponse
     */
    public function getActivatedNewsAction()
    {


        $serviceActuality = $this->get(self::SERVICENAME);
        $Actualities = $serviceActuality->findAllActivatedActualite();

        $ActualitiesJson = Serialiser::serializer($Actualities);

        return new JsonResponse($ActualitiesJson);

    }


    /**
     * @Rest\Get("/getNews/{idNews}")
     */
    public function getNewsAction(Request $request)
    {
        $serviceActuality = $this->get(self::SERVICENAME);
        $Actuality = $serviceActuality->getActualite($request->get('idNews'));

        $ActualityJson = Serialiser::serializer($Actuality);
        return new JsonResponse($ActualityJson);


    }


    /**
     * @Rest\Delete("/deleteNews/{idNews}")
     */
    public function deleteNewsAction(Request $request)
    {
        $serviceActuality = $this->get(self::SERVICENAME);
        $serviceActuality->deleteActualite($request->get('idNews'));


        return new JsonResponse('success');
    }


}