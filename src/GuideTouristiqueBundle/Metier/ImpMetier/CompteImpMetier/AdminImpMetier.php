<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:11
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\AdminIMetier;

class AdminImpMetier implements AdminIMetier
{
    const CLASSNAMEUSER = 'Admin';
    protected static $idaoImpAdmin;
    protected static $etatImpMetier;
    protected static $security;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\AdminIDao $idaoImpAdmin, \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $security, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpAdmin = $idaoImpAdmin;
        self::$security = $security;


        self::$etatImpMetier = $etatImpMetier;


    }


    public function login($requestContent)
    {
        // TODO: Implement login() method.
    }

    public function addAdmin($data)
    {
        // TODO: Implement addAdmin() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $admin = self::$idaoImpAdmin->addAdmin($data);

        return $admin;
    }

    public function updateAdmin($requestContent)
    {
        // TODO: Implement updateAdmin() method.
    }

    public function deleteAdmin($id)
    {
        // TODO: Implement deleteAdmin() method.
    }

    public function getAllAdmin()
    {
        // TODO: Implement getAllAdmin() method.
    }

    public function findAllActivatedAdmins()
    {
        // TODO: Implement findAllActivatedAdmins() method.
    }

    public function getAdmin($id)
    {
        // TODO: Implement getAdmin() method.
    }
}