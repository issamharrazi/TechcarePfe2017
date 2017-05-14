<?php

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\Document\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * @Rest\Post("/createT")
     */
    public function createTaskAction(Request $request)
    {
        $user = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->find($request->get('id_user'));


        $task = new Task();
        $task->setDescription($request->get('desc'));
        $task->setState($request->get('state'));
        $task->setUser($user);
        $dm = $this->get('doctrine_mongodb')->getManager();
        // $dm->persist($user);
        $dm->persist($task);
        $dm->flush();

        return new JsonResponse($task);
    }

    /**
     * @Rest\Get("/shTask")
     */
    public function showTaskAction()
    {
        $tasks = [];
        $tasks = $this->get('doctrine_mongodb')
            ->getRepository('Tache.php')
            ->findAll();


        $formatted = [];
        foreach ($tasks as $task) {
            $formatted[] = [
                'desc' => $task->getDescription(),
                'state' => $task->getState(),
                'user' => $task->getUser()
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Delete("/dTask/{id}")
     */
    public function removeTaskAction(Request $request)
    {
        $task = $this->get('doctrine_mongodb')
            ->getRepository('Tache.php')
            ->find($request->get('id'));
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->remove($task);
        $dm->flush();
        return new JsonResponse($task);
    }

    /**
     * @Rest\View()
     * @Rest\Put("/taskUp/{id}")
     */
    public function updateTaskAction(Request $request)
    {
        $task = $this->get('doctrine_mongodb')
            ->getRepository('Tache.php')
            ->find($request->get('id')); // L'identifiant en tant que paramètre n'est plus nécessaire


        if (empty($task)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->merge($task);
        $dm->flush();
        return new JsonResponse($task);

    }
}
