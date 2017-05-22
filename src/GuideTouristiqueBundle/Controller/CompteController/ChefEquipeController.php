<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 03:23
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ChefEquipeController extends Controller
{
    const SERVICENAME = 's.chef_equipe.impmetier';


    /**
     * @Rest\Post("/addChefEquipe")
     */
    public function addChefEquipeAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $ChefEquipe = $userManager->createUser();
        $event = new GetResponseUserEvent($ChefEquipe, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceChefEquipe = $this->get(self::SERVICENAME);

        $ChefEquipe = $serviceChefEquipe->addChefEquipe($data);
        if ($ChefEquipe)
            return new Response(Serialiser::serializer('Client Achat created.'), Response::HTTP_CREATED);
        else
            return new Response(Serialiser::serializer('Client Achat existe.'), Response::HTTP_EXPECTATION_FAILED);


    }

    /**
     * @Rest\Put("/updateChefEquipe")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateChefEquipeAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceChefEquipe = $this->get(self::SERVICENAME);
        $ChefEquipe = $serviceChefEquipe->updateChefEquipe($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllChefEquipe")
     * @return JsonResponse
     */
    public function getAllChefEquipeAction()
    {


        $serviceChefEquipe = $this->get(self::SERVICENAME);
        $ChefEquipe = $serviceChefEquipe->getAllChefEquipe();

        $ChefEquipeJson = Serialiser::serializer($ChefEquipe);

        return new JsonResponse($ChefEquipeJson);

    }

    /**
     * @Rest\Get("/getActivatedChefEquipe")
     * @return JsonResponse
     */
    public function getActivatedChefEquipeAction()
    {


        $serviceChefEquipe = $this->get(self::SERVICENAME);
        $ChefEquipe = $serviceChefEquipe->findAllActivatedChefEquipe();

        $ChefEquipeJson = Serialiser::serializer($ChefEquipe);

        return new JsonResponse($ChefEquipeJson);

    }

    /**
     * @Rest\Get("/getChefEquipe/{idChefEquipe}")
     */
    public function getChefEquipeAction(Request $request)
    {
        $serviceChefEquipe = $this->get(self::SERVICENAME);
        $ChefEquipe = $serviceChefEquipe->getChefEquipe($request->get('idChefEquipe'));

        $ChefEquipeJson = Serialiser::serializer($ChefEquipe);
        return new JsonResponse($ChefEquipeJson);


    }

    /**
     * @Rest\Delete("/deleteChefEquipe/{idChefEquipe}")
     */
    public function deleteChefEquipeAction(Request $request)
    {
        $serviceChefEquipe = $this->get(self::SERVICENAME);
        $serviceChefEquipe->deleteChefEquipe($request->get('idChefEquipe'));


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