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

class ClientVenteController extends Controller
{
    const SERVICENAME = 's.client_vente.impmetier';


    /**
     * @Rest\Post("/addClientVente")
     */
    public function addClientVenteAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $ClientVente = $userManager->createUser();
        $event = new GetResponseUserEvent($ClientVente, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceClientVente = $this->get(self::SERVICENAME);
        $ClientVente = $serviceClientVente->addClientVente($data);


        return new Response(Serialiser::serializer('Client Vente created.'), Response::HTTP_CREATED);
    }

    /**
     * @Rest\Put("/updateClientVente")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateClientVenteAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceClientVente = $this->get(self::SERVICENAME);
        $ClientVente = $serviceClientVente->updateClientVente($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllClientsVente")
     * @return JsonResponse
     */
    public function getAllClientsVenteAction()
    {


        $serviceClientVente = $this->get(self::SERVICENAME);
        $ClientsVente = $serviceClientVente->getAllClientsVente();

        $ClientsVenteJson = Serialiser::serializer($ClientsVente);

        return new JsonResponse($ClientsVenteJson);

    }

    /**
     * @Rest\Get("/getActivatedClientsVente")
     * @return JsonResponse
     */
    public function getActivatedClientsVenteAction()
    {


        $serviceClientVente = $this->get(self::SERVICENAME);
        $ClientsVente = $serviceClientVente->findAllActivatedClientsVente();

        $ClientsVenteJson = Serialiser::serializer($ClientsVente);

        return new JsonResponse($ClientsVenteJson);

    }

    /**
     * @Rest\Get("/getClientVente/{idClientVente}")
     */
    public function getClientVenteAction(Request $request)
    {
        $serviceClientVente = $this->get(self::SERVICENAME);
        $ClientVente = $serviceClientVente->getClientVente($request->get('idClientVente'));

        $ClientVenteJson = Serialiser::serializer($ClientVente);
        return new JsonResponse($ClientVenteJson);


    }

    /**
     * @Rest\Delete("/deleteClientVente/{idClientVente}")
     */
    public function deleteClientVenteAction(Request $request)
    {
        $serviceClientVente = $this->get(self::SERVICENAME);
        $serviceClientVente->deleteClientVente($request->get('idClientVente'));


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