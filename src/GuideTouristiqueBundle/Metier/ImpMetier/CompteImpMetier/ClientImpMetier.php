<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 15:55
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class ClientImpMetier
{


    protected static $idaoImpClient;
    protected static $etatImpMetier;

    protected static $security;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientIdao $idaoImpClient, \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $security, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpClient = $idaoImpClient;
        self::$security = $security;


        self::$etatImpMetier = $etatImpMetier;


    }

    public function loginClient($data)
    {
        // TODO: Implement loginClientAchat() method.
        $Client = self::$idaoImpClient->FindClientByMail($data['email']);

        if (!$Client) {
            // throw $this->createNotFoundException();

        }

        $validPassword = self::$security->isPasswordValid($data, $data['password']);

        if (!$validPassword) {
            throw new BadCredentialsException();
        }


        return $Client;
    }

}