<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 00:09
 */

namespace GuideTouristiqueBundle\Controller\PublicationController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EvenementTraductionController extends Controller
{
    const SERVICENAME = 's.evenement_traduction.impmetier';

    /**
     * @Rest\Post("/addTranslationEvent")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTranslationEventAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTranslationEvent = $this->get(self::SERVICENAME);
        $TranslationEvent = $serviceTranslationEvent->addEvenementTraduction($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/updateTranslationEvent")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTranslationEventAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTranslationEvent = $this->get(self::SERVICENAME);
        $TranslationEvent = $serviceTranslationEvent->updateEvenementTraduction($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllTranslationEvents")
     * @return JsonResponse
     */
    public function getAllTranslationEventsAction()
    {


        $serviceTranslationEvents = $this->get(self::SERVICENAME);
        $TranslationEvents = $serviceTranslationEvents->getAllEvenementsTraduction();

        $TranslationEventsJson = Serialiser::serializer($TranslationEvents);

        return new JsonResponse($TranslationEventsJson);

    }


    /**
     * @Rest\Get("/getTranslationEvent/{idTranslationEvent}")
     */
    public function getTranslationEventAction(Request $request)
    {
        $serviceTranslationEvent = $this->get(self::SERVICENAME);
        $TranslationEvent = $serviceTranslationEvent->getEvenementTraduction($request->get('idTranslationEvent'));

        $TranslationEventJson = Serialiser::serializer($TranslationEvent);
        return new JsonResponse($TranslationEventJson);


    }


    /**
     * @Rest\Delete("/deleteTranslationEvent/{idTranslationEvent}")
     */
    public function deleteTranslationEventAction(Request $request)
    {
        $serviceTranslationEvent = $this->get(self::SERVICENAME);
        $serviceTranslationEvent->deleteEvenementTraduction($request->get('idTranslationEvent'));


        return new JsonResponse('success');
    }


}