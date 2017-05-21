<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 15:55
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

class ClientImpMetier
{

    const CLASSNAMECLIENT = 'Client';

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
        $validPassword = null;

        // TODO: Implement loginClientAchat() method.
        $Client = self::$idaoImpClient->FindByMail($data['email'], self::CLASSNAMECLIENT);
        if ($Client)
            $validPassword = self::$security->isPasswordValid($Client, $data['password']);

        else
            return null;


        if (!$validPassword) {
            return null;
        }


        return $Client;
    }

}