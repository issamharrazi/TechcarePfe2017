<?php

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @Rest\Delete("/dUser/{id}")
     */
    public function removeUserAction(Request $request)
    {
        $user = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->find($request->get('id'));
        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->remove($user);
        $dm->flush();
        return new JsonResponse($user);
    }

    /**
     * @Rest\Get("/shUser")
     */
    public function showUserAction()
    {
        $users = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->findAll();
        $formatted = [];
        foreach ($users as $user) {
            if (!in_array("ROLE_ADMIN", $user->getRoles()) && !in_array("ROLE_SUPER_ADMIN", $user->getRoles())) {
                $formatted[] = [
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'tel' => $user->getNumTel(),
                    'plainPassword' => $user->getPassword(),
                    'role' => $user->getRoles(),
                    'tasks' => $user->getTasks()
                ];
            }
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/shAUser")
     */
    public function showAllUserAction()
    {
        $users = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->findAll();
        $formatted = [];
        foreach ($users as $user) {
            $formatted[] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'tel' => $user->getNumTel(),
                'plainPassword' => $user->getPassword(),
                'role' => $user->getRoles(),
                'tasks' => $user->getTasks()
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/shAdmin")
     */
    public function showAdminAction()
    {
        $users = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->findAll();
        $formatted = [];
        foreach ($users as $user) {
            if (in_array("ROLE_ADMIN", $user->getRoles())) {
                $formatted[] = [
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'tel' => $user->getNumTel(),
                    'plainPassword' => $user->getPassword(),
                    'role' => $user->getRoles(),
                    'tasks' => $user->getTasks()
                ];
            }
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Get("/shSuperAdmin")
     */
    public function showSuperAdminAction()
    {
        $users = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->findAll();
        $formatted = [];
        foreach ($users as $user) {
            if (in_array("ROLE_ADMIN", $user->getRoles())) {
                $formatted[] = [
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'prenom' => $user->getPrenom(),
                    'email' => $user->getEmail(),
                    'tel' => $user->getNumTel(),
                    'plainPassword' => $user->getPassword(),
                    'role' => $user->getRoles(),
                    'tasks' => $user->getTasks()
                ];
            }
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\Put("/upUser/{id}")
     */
    public function updateUserAction(Request $request)
    {
        $user = $this->get('doctrine_mongodb')
            ->getRepository('GuideTouristiqueBundle:User')
            ->find($request->get('id'));


        if (empty($user)) {
            return new JsonResponse(['message' => 'Place not found'], Response::HTTP_NOT_FOUND);
        }
        {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $user->setUsername($request->get('username'));
            $user->setPrenom($request->get('prenom'));
            $user->setEmail($request->get('mail'));
            $user->setNumTel($request->get('numTel'));

            $dm->merge($user);
            $dm->flush();
        }
        return new JsonResponse($user);

    }

}
