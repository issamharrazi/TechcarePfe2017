<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 15:55
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\LoginIMetier;

class LoginImpMetier implements LoginIMetier
{

    const CLASSNAMECLIENT = 'Client';
    const CLASSNAMEADMIN = 'Admin';


    protected static $idaoImpLogin;
    protected static $etatImpMetier;

    protected static $security;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\LoginIdao $idaoImpLogin, \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $security, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpLogin = $idaoImpLogin;
        self::$security = $security;


        self::$etatImpMetier = $etatImpMetier;


    }

    public function loginClient($data)
    {
        $validPassword = null;

        // TODO: Implement loginClientAchat() method.
        $Client = self::$idaoImpLogin->FindByMail($data['email'], self::CLASSNAMECLIENT);
        if ($Client)
            $validPassword = self::$security->isPasswordValid($Client, $data['password']);

        else
            return null;


        if (!$validPassword) {
            return null;
        }


        return $Client;
    }

    public function loginAdmin($data)
    {
        $validPassword = null;

        // TODO: Implement loginClientAchat() method.
        $Admin = self::$idaoImpLogin->FindByMail($data['email'], self::CLASSNAMEADMIN);
        if ($Admin)
            $validPassword = self::$security->isPasswordValid($Admin, $data['password']);

        else
            return null;


        if (!$validPassword) {
            return null;
        }


        return $Admin;
    }


}