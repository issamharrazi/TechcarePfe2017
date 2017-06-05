<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 27/05/2017
 * Time: 02:53
 */

namespace GuideTouristiqueBundle\Controller\CompteController;


use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use GuideTouristiqueBundle\services\Serialiser;
use GuideTouristiqueBundle\services\SetHeaders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class GenericAdminController extends Controller
{

    const SERVICENAME = 's.generic_admin.impmetier';


    /**
     * @Rest\Post("/addAdmin")
     */
    public function addAdminAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        /** @var \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $Admin = $userManager->createUser();
        $event = new GetResponseUserEvent($Admin, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }


        $serviceAdmin = $this->get(self::SERVICENAME);

        $Admin = $serviceAdmin->addAdmin($data);
        if ($Admin)
            return new Response(Serialiser::serializer($Admin->getId()), Response::HTTP_CREATED);
        else
            return new Response(Serialiser::serializer('Admin existe.'), Response::HTTP_EXPECTATION_FAILED);


    }

    /**
     * @Rest\Post("/loginAdmin")
     */
    public function loginAdminAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $serviceAdmin = $this->get(self::SERVICENAME);
        $Admin = $serviceAdmin->loginAdmin($data);
        if ($Admin == null)
            $response = new Response(Serialiser::serializer(Response::HTTP_FORBIDDEN));
        else {
            $token = $this->getToken($Admin);
            $response = new Response(Serialiser::serializer(['token' => $token, 'role' => $Admin->getRoles()]), Response::HTTP_OK);


        }


        return SetHeaders::setBaseHeaders($response);
    }

    /**
     * Returns token for user.
     *
     *
     *
     * @return array
     */
    public function getToken($document)
    {
        return $this->container->get('lexik_jwt_authentication.encoder.default')
            ->encode([
                'id' => $document->getId(),
                'role' => $document->getRoles(),
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