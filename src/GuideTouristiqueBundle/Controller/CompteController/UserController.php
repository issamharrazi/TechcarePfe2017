<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/2017
 * Time: 17:59
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use GuideTouristiqueBundle\Document\User;
use GuideTouristiqueBundle\services\Serialiser;
use GuideTouristiqueBundle\services\SetHeaders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class UserController extends Controller
{


    const SERVICENAME = 's.user.impmetier';

    /**
     * @Rest\Post("/login")
     */
    public function loginAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $serviceUser = $this->get(self::SERVICENAME);
        $user = $serviceUser->login($data);

        $token = $this->getToken($user);


        $response = new Response(Serialiser::serializer(['token' => $token, 'rol' => $user->getRoles()]), Response::HTTP_OK);

        return SetHeaders::setBaseHeaders($response);
    }


    /**
     * Returns token for user.
     *
     * @param User $user
     *
     * @return array
     */
    public function getToken(User $user)
    {
        return $this->container->get('lexik_jwt_authentication.encoder.default')
            ->encode([
                'id' => $user->getId(),
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'role' => $user->getRoles(),
                'exp' => $this->getTokenExpiryDateTime(),
            ]);
    }

    /**
     * Returns token expiration datetime.
     *
     * @return string Unixtmestamp
     */
    private function getTokenExpiryDateTime()
    {
        $tokenTtl = $this->container->getParameter('lexik_jwt_authentication.token_ttl');
        $now = new \DateTime();
        $now->add(new \DateInterval('PT' . $tokenTtl . 'S'));

        return $now->format('U');
    }


    /**
     * @Rest\Post("/addUser")
     */
    public function addUserAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceUser = $this->get(self::SERVICENAME);
        $user = $serviceUser->addUser($data);


        return new Response(Serialiser::serializer('User created.'), Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/updateUser")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateUserAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceUser = $this->get(self::SERVICENAME);
        $User = $serviceUser->updateUser($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllUser")
     * @return JsonResponse
     */
    public function getAllUserAction()
    {


        $serviceUser = $this->get(self::SERVICENAME);
        $Users = $serviceUser->getAllUser();

        $UsersJson = Serialiser::serializer($Users);

        return new JsonResponse($UsersJson);

    }

    /**
     * @Rest\Get("/getActivatedUsers")
     * @return JsonResponse
     */
    public function getActivatedUsersAction()
    {


        $serviceUser = $this->get(self::SERVICENAME);
        $Users = $serviceUser->findAllActivatedUsers();

        $UsersJson = Serialiser::serializer($Users);

        return new JsonResponse($UsersJson);

    }

    /**
     * @Rest\Get("/getUser/{idUser}")
     */
    public function getUserAction(Request $request)
    {
        $serviceUser = $this->get(self::SERVICENAME);
        $User = $serviceUser->getUser($request->get('idUser'));

        $userJson = Serialiser::serializer($User);
        return new JsonResponse($userJson);


    }

    /**
     * @Rest\Delete("/deleteUser/{idUser}")
     */
    public function deleteUserAction(Request $request)
    {
        $serviceUser = $this->get(self::SERVICENAME);
        $serviceUser->deleteUser($request->get('idUser'));


        return new JsonResponse('success');
    }

    /**
     * @param  Request $request
     * @param  FormInterface $form
     */
    private function processForm(Request $request, FormInterface $form)
    {
        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            throw new BadRequestHttpException();
        }

        $form->submit($data);
    }



}