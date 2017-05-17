<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 14:00
 */


namespace GuideTouristiqueBundle\Controller\TacheController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TacheController extends Controller
{

    const SERVICENAME = 's.tache.impmetier';

    /**
     * @Rest\Post("/addTask")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTaskAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->addTache($data);

        //$devisesJson= Serialiser::serializer($devise);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Put("/updateTask")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTaskAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->updateTache($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllTasks")
     * @return JsonResponse
     */
    public function getAllTasksAction()
    {


        $serviceTask = $this->get(self::SERVICENAME);
        $Tasks = $serviceTask->getAllTaches();

        $TasksJson = Serialiser::serializer($Tasks);

        return new JsonResponse($TasksJson);

    }


    /**
     * @Rest\Get("/getActivatedTasks")
     * @return JsonResponse
     */
    public function getActivatedTasksAction()
    {


        $serviceTask = $this->get(self::SERVICENAME);
        $Tasks = $serviceTask->findAllActivatedTaches();

        $TasksJson = Serialiser::serializer($Tasks);

        return new JsonResponse($TasksJson);

    }


    /**
     * @Rest\Get("/getTask/{idTask}")
     */
    public function getTaskAction(Request $request)
    {
        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->getTache($request->get('idTask'));

        $TaskJson = Serialiser::serializer($Task);
        return new JsonResponse($TaskJson);


    }


    /**
     * @Rest\Delete("/deleteTask/{idTask}")
     */
    public function deleteTaskAction(Request $request)
    {
        $serviceTask = $this->get(self::SERVICENAME);
        $serviceTask->deleteTache($request->get('idTask'));


        return new JsonResponse('success');
    }

}