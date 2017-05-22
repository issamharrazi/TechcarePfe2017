<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 04:35
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use GuideTouristiqueBundle\Document\User;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class SuperAdminController extends Controller
{
    const SERVICENAME = 's.super_admin.impmetier';


    /**
     * @Rest\Post("/addSuperAdmin")
     */
    public function addSuperAdminAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $SuperAdmin = $userManager->createUser();
        $event = new GetResponseUserEvent($SuperAdmin, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceSuperAdmin = $this->get(self::SERVICENAME);

        $SuperAdmin = $serviceSuperAdmin->addSuperAdmin($data);
        if ($SuperAdmin)
            return new Response(Serialiser::serializer('Client Achat created.'), Response::HTTP_CREATED);
        else
            return new Response(Serialiser::serializer('Client Achat existe.'), Response::HTTP_EXPECTATION_FAILED);


    }

    /**
     * @Rest\Put("/updateSuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateSuperAdminAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->updateSuperAdmin($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllSuperAdmin")
     * @return JsonResponse
     */
    public function getAllSuperAdminAction()
    {


        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->getAllSuperAdmin();

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);

        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Get("/getActivatedSuperAdmin")
     * @return JsonResponse
     */
    public function getActivatedSuperAdminAction()
    {


        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->findAllActivatedSuperAdmin();

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);

        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Get("/getSuperAdmin/{idSuperAdmin}")
     */
    public function getSuperAdminAction(Request $request)
    {
        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->getSuperAdmin($request->get('idSuperAdmin'));

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);
        return new JsonResponse($SuperAdminJson);


    }

    /**
     * @Rest\Delete("/deleteSuperAdmin/{idSuperAdmin}")
     */
    public function deleteSuperAdminAction(Request $request)
    {
        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $serviceSuperAdmin->deleteSuperAdmin($request->get('idSuperAdmin'));


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