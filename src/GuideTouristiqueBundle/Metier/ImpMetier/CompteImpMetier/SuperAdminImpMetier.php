<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 03:59
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\SuperAdminIMetier;

class SuperAdminImpMetier implements SuperAdminIMetier
{

    const CLASSNAMESUPERADMIN = 'Admin';
    protected static $idaoImpSuperAdmin;
    protected static $etatImpMetier;
    protected static $adresseImpMetier;
    protected static $imageImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\SuperAdminIdao $idaoImpSuperAdmin, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier $adresseImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpSuperAdmin = $idaoImpSuperAdmin;


        self::$etatImpMetier = $etatImpMetier;
        self::$imageImpMetier = $imageImpMetier;
        //   self::$clientImpMetier = $clientImpMetier;
        self::$adresseImpMetier = $adresseImpMetier;


    }

    public function updateSuperAdmin($data)
    {
        // TODO: Implement updateSuperAdmin() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $data['adresse'] = self::$adresseImpMetier->updateAdresse($data['adresse']);


        $data['image'] = self::$imageImpMetier->updateImage($data['image']);


        $SuperAdmin = self::$idaoImpSuperAdmin->findById(self::CLASSNAMESUPERADMIN, $data['id']);
        return self::$idaoImpSuperAdmin->UpdateSuperAdmin($SuperAdmin, $data);

    }

    public function deleteSuperAdmin($id)
    {
        // TODO: Implement deleteSuperAdmin() method.
        $SuperAdmin = self::$idaoImpSuperAdmin->findById(self::CLASSNAMESUPERADMIN, $id);
        self::$adresseImpMetier->deleteAdresse($SuperAdmin->getAdresse()->getId());
        self::$imageImpMetier->deleteImage($SuperAdmin->getImage()->getId());


        self::$idaoImpSuperAdmin->delete($SuperAdmin);

    }

    public function getAllSuperAdmins()
    {
        // TODO: Implement getAllSuperAdmins() method.
        return self::$idaoImpSuperAdmin->findAll(self::CLASSNAMESUPERADMIN);

    }

    public function findAllActivatedSuperAdmins()
    {
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        return static::$idaoImpSuperAdmin->findAllActivated(self::CLASSNAMESUPERADMIN);

        // TODO: Implement findAllActivatedSuperAdmins() method.
    }

    public function getSuperAdmin($id)
    {
        // TODO: Implement getSuperAdmin() method.
        return self::$idaoImpSuperAdmin->findById(self::CLASSNAMESUPERADMIN, $id);

    }

    public function getSuperAdminByMail($mail)
    {
        // TODO: Implement getSuperAdminByMail() method.
        return self::$idaoImpSuperAdmin->FindByMail($mail, self::CLASSNAMESUPERADMIN);

    }
}