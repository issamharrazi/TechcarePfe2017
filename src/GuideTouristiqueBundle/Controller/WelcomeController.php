<?php

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("is_granted('ROLE_USER')")
 */
class WelcomeController extends Controller
{
    use \GuideTouristiqueBundle\Helper\ControllerHelper;

    /**
     * @Rest\Get("/welcome")
     */
    public function welcomeAction(Request $request)
    {
        $response = new Response($this->serialize('Hello user.'), Response::HTTP_OK);

        return $this->setBaseHeaders($response);
    }
}
