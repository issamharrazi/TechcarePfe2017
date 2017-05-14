<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 21:25
 */

namespace GuideTouristiqueBundle\Controller\PublicationController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ActualiteTraductionController extends Controller
{
    const SERVICENAME = 's.actualite_traduction.impmetier';

    /**
     * @Rest\Post("/addTranslationNews")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTranslationNewsAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTranslationNews = $this->get(self::SERVICENAME);
        $TranslationNews = $serviceTranslationNews->addActualiteTraduction($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/updateTranslationNews")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTranslationNewsAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTranslationNews = $this->get(self::SERVICENAME);
        $TranslationNews = $serviceTranslationNews->updateActualiteTraduction($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllTranslationNews")
     * @return JsonResponse
     */
    public function getAllTranslationNewsAction()
    {


        $serviceTranslationNews = $this->get(self::SERVICENAME);
        $TranslationNews = $serviceTranslationNews->getAllActualitesTraduction();

        $TranslationNewsJson = Serialiser::serializer($TranslationNews);

        return new JsonResponse($TranslationNewsJson);

    }


    /**
     * @Rest\Get("/getTranslationNews/{idTranslationNews}")
     */
    public function getTranslationNewsAction(Request $request)
    {
        $serviceTranslationNews = $this->get(self::SERVICENAME);
        $TranslationNews = $serviceTranslationNews->getActualiteTraduction($request->get('idTranslationNews'));

        $TranslationNewsJson = Serialiser::serializer($TranslationNews);
        return new JsonResponse($TranslationNewsJson);


    }


    /**
     * @Rest\Delete("/deleteTranslationNews/{idTranslationNews}")
     */
    public function deleteTranslationNewsAction(Request $request)
    {
        $serviceTranslationNews = $this->get(self::SERVICENAME);
        $serviceTranslationNews->deleteActualiteTraduction($request->get('idTranslationNews'));


        return new JsonResponse('success');
    }


}