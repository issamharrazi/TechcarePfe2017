<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 12:15
 */

namespace GuideTouristiqueBundle\Controller\PublicationController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class EvenementController extends Controller
{

    const SERVICENAME = 's.evenement.impmetier';

    /**
     * @Rest\Post("/addEvent")
     * @param Request $request
     * @return JsonResponse
     */
    public function addEventAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceEvent = $this->get(self::SERVICENAME);
        $Event = $serviceEvent->addEvenement($data);

        return new JsonResponse('ok');
    }

    /**
     * @Rest\Put("/update$Event")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateEventAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceEvent = $this->get(self::SERVICENAME);
        $Event = $serviceEvent->updateEvenement($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllEvents")
     * @return JsonResponse
     */
    public function getAllEventsAction()
    {


        $serviceEvent = $this->get(self::SERVICENAME);
        $Events = $serviceEvent->getAllEvenements();

        $EventsJson = Serialiser::serializer($Events);

        return new JsonResponse($EventsJson);

    }

    /**
     * @Rest\Get("/getActivatedEvents)
     * @return JsonResponse
     */
    public function getActivatedEvenstAction()
    {


        $serviceEvent = $this->get(self::SERVICENAME);
        $Events = $serviceEvent->findAllActivatedEvents();

        $EventsJson = Serialiser::serializer($Events);

        return new JsonResponse($EventsJson);

    }


    /**
     * @Rest\Get("/getEvent/{idEvent}")
     */
    public function getEventAction(Request $request)
    {
        $serviceEvent = $this->get(self::SERVICENAME);
        $Event = $serviceEvent->getEvenement($request->get('idEvent'));

        $EventJson = Serialiser::serializer($Event);
        return new JsonResponse($EventJson);


    }


    /**
     * @Rest\Delete("/deleteEvent/{idEvent}")
     */
    public function deleteEventAction(Request $request)
    {
        $serviceEvent = $this->get(self::SERVICENAME);
        $serviceEvent->deleteEvenement($request->get('idEvent'));


        return new JsonResponse('success');
    }


}