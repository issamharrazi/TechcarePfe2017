<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 14:59
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

class ClientAchatController extends Controller
{
    const SERVICENAME = 's.client_achat.impmetier';


    /**
     * @Rest\Post("/addClientAchat")
     */
    public function addClientAchatAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $ClientAchat = $userManager->createUser();
        $event = new GetResponseUserEvent($ClientAchat, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceClientAchat = $this->get(self::SERVICENAME);

        $ClientAchat = $serviceClientAchat->addClientAchat($data);
        if ($ClientAchat)
            return new Response(Serialiser::serializer('Client Achat created.'), Response::HTTP_CREATED);
        else
            return new Response(Serialiser::serializer('Client Achat existe.'), Response::HTTP_EXPECTATION_FAILED);


    }

    /**
     * @Rest\Put("/updateClientAchat")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateClientAchatAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceClientAchat = $this->get(self::SERVICENAME);
        $ClientAchat = $serviceClientAchat->updateClientAchat($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllClientsAchat")
     * @return JsonResponse
     */
    public function getAllClientsAchatAction()
    {


        $serviceClientAchat = $this->get(self::SERVICENAME);
        $ClientsAchat = $serviceClientAchat->getAllClientsAchat();

        $ClientsAchatJson = Serialiser::serializer($ClientsAchat);

        return new JsonResponse($ClientsAchatJson);

    }

    /**
     * @Rest\Get("/getActivatedClientsAchat")
     * @return JsonResponse
     */
    public function getActivatedClientsAchatAction()
    {


        $serviceClientAchat = $this->get(self::SERVICENAME);
        $ClientsAchat = $serviceClientAchat->findAllActivatedClientsAchat();

        $ClientsAchatJson = Serialiser::serializer($ClientsAchat);

        return new JsonResponse($ClientsAchatJson);

    }

    /**
     * @Rest\Get("/getClientAchat/{idClientAchat}")
     */
    public function getClientAchatAction(Request $request)
    {
        $serviceClientAchat = $this->get(self::SERVICENAME);
        $ClientAchat = $serviceClientAchat->getClientAchat($request->get('idClientAchat'));

        $ClientAchatJson = Serialiser::serializer($ClientAchat);
        return new JsonResponse($ClientAchatJson);


    }

    /**
     * @Rest\Delete("/deleteClientAchat/{idClientAchat}")
     */
    public function deleteClientAchatAction(Request $request)
    {
        $serviceClientAchat = $this->get(self::SERVICENAME);
        $serviceClientAchat->deleteClientAchat($request->get('idClientAchat'));


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