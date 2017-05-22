<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 16:42
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\Document\Client;
use GuideTouristiqueBundle\services\Serialiser;
use GuideTouristiqueBundle\services\SetHeaders;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    const SERVICENAME = 's.login.impmetier';

    /**
     * @Rest\Post("/login")
     */
    public function loginClientAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $serviceClient = $this->get(self::SERVICENAME);
        $Client = $serviceClient->loginClient($data);
        if ($Client == null)
            $response = new Response(Serialiser::serializer(Response::HTTP_FORBIDDEN));
        else {
            $token = $this->getToken($Client);
            $response = new Response(Serialiser::serializer(['token' => $token, 'role' => $Client->getRoles()]), Response::HTTP_OK);


        }



        return SetHeaders::setBaseHeaders($response);
    }

    /**
     * Returns token for user.
     *
     * @param Client $client
     *
     * @return array
     */
    public function getToken(Client $client)
    {
        return $this->container->get('lexik_jwt_authentication.encoder.default')
            ->encode([
                'id' => $client->getId(),
                'role' => $client->getRoles(),
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


}