<?php

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class RegistrationController extends BaseController
{
    use \GuideTouristiqueBundle\Helper\ControllerHelper;


    /**
     * @Rest\Post("/registration")
     */
    public function registerAction(Request $request)
    {
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
        $dm = $this->get('doctrine_mongodb')->getManager();
        $user->setUsername($request->get('username'));
        $user->setPlainPassword($request->get('plainPassword'));
        $user->setPrenom($request->get('prenom'));
        $user->setEmail($request->get('email'));
        $user->setNumTel($request->get('numTel'));
        $user->setRoles(array($request->get('role')));
        $user->setEnabled(true);
        $dm->persist($user);
        $dm->flush();

        return new Response($this->serialize('User created.'), Response::HTTP_CREATED);
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