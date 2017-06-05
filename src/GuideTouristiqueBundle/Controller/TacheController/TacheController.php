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

        //  $devisesJson= Serialiser::serializer($Task);

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
        dump($data);
        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->updateTache($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Put("/uploadRealizedTask")
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadRealizedTaskAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        dump($data);
        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->uploadRealizedTask($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Put("/changeStateTask")
     * @param Request $request
     * @return JsonResponse
     */
    public function changeStateTaskAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        dump($data);
        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->changerEtatTache($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Put("/changeTemporaryStateTask")
     * @param Request $request
     * @return JsonResponse
     */
    public function changeTemporaryStateTaskAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->changerTemporairementEtatTache($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Put("/updateChangingState")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateChangingStateAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        dump($data);
        $serviceTask = $this->get(self::SERVICENAME);
        $Task = $serviceTask->modifierchangementEtatTache($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllTasks/{idAdmin}")
     * @return JsonResponse
     */
    public function getAllTasksAction(Request $request)
    {


        $serviceTask = $this->get(self::SERVICENAME);


        $Tasks = $serviceTask->getAllTaches($request->get('idAdmin'));


        $TasksJson = Serialiser::serializer($Tasks);

        return new JsonResponse($TasksJson);

    }

    /**
     * @Rest\Get("/getAllChangedStateCETasks")
     * @return JsonResponse
     */
    public function getAllChangedStateCETasksAction()
    {


        $serviceTask = $this->get(self::SERVICENAME);
        $Tasks = $serviceTask->findAllStateChangesByChefEquipe();

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