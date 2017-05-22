<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 06:16
 */

namespace GuideTouristiqueBundle\Controller;


use FOS\UserBundle\Controller\RegistrationController as BaseController;

class RegistrationController extends BaseController
{

    /**
     * registerProAction
     * WARNING: This method is kind of a duplicate of the base FOS RegistationController,
     * but adds a ROLE_PRO and override the default handler to add our ow FormType
     * It also changes the redirect route
     *
     * @access public
     * @return void
     */
    /*  public function registerProAction()
      {
          $class = $this->container->getParameter('fos_user.model.user.clas')
          $form = $this->container->get('form.factory')
              ->create(new RegistrationClientFormType($class));

          $formHandler = $this->getFormHandler($form);

          $process = $formHandler->process(false);

          if ($process) {
              $user = $form->getData();
              $user->addRole('ROLE_PRO');

              $route = 'pro_dashboard_index';

              $this->setFlash('fos_user_success', 'registration.flash.user_reted');
              $url = $this->container->get('router')->generate($route);
              $response = new RedirectResponse($url);

              $this->authenticateUser($user, $response);

              return $response;
          }

          $params = ['form' => $form->createView()];

          return $this->container
              ->get('templating')
              ->renderResponse('MapadoUserBundle:Registration:register.html.twig', $params);
      }

      /**
       * getFormHandler
       *
       * @param mixed $form
       * @access protected
       * @return RegistrationFormHandler
       */
    /*  protected function getFormHandler($form)
      {

          return new \FOS\UserBundle\Form\Handler\RegistrationFormHandler(
              $form,
              $this->container->get('request'),
              $this->container->get('fos_user.user_manager'),
              $this->container->get('fos_user.mailer'),
              $this->container->get('fos_user.util.token_generator')
          );
      }*/
}