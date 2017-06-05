<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 27/05/2017
 * Time: 03:12
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\GenericAdminIMetier;

class GenericAdminImpMetier implements GenericAdminIMetier
{
    const CLASSNAMEADMIN = 'Admin';


    protected static $idaoImpAdmin;
    protected static $etatImpMetier;
    protected static $imageImpMetier;


    protected static $security;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\GenericAdminIdao $idaoImpAdmin, \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $security, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpAdmin = $idaoImpAdmin;
        self::$security = $security;
        self::$imageImpMetier = $imageImpMetier;


        self::$etatImpMetier = $etatImpMetier;
    }


    public function loginAdmin($data)
    {
        $validPassword = null;

        // TODO: Implement loginClientAchat() method.
        $Admin = self::$idaoImpAdmin->FindByMail($data['email'], self::CLASSNAMEADMIN);
        if ($Admin)
            $validPassword = self::$security->isPasswordValid($Admin, $data['password']);

        else
            return null;


        if (!$validPassword) {
            return null;
        }


        return $Admin;
    }

    public function addAdmin($data)
    {
        // TODO: Implement addAdmin() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $image = self::$imageImpMetier->findExistImage($data['image']['media']);
        if (empty($image)) {
            $data['image'] = self::$imageImpMetier->addImage($data['image']);

        } else {
            $data['image'] = $image;
        }

        $imagecover = self::$imageImpMetier->findExistImage($data['imagecover']['media']);
        if (empty($imagecover)) {
            $data['imagecover'] = self::$imageImpMetier->addImage($data['imagecover']);

        } else {
            $data['imagecover'] = $imagecover;
        }


        /*  if(isset($data['imageCover']))
          {
              $data['imageCover'] = self::$imageImpMetier->findExistImage($data['imagecover']['media']);
              if(!isset($data['imageCover']))
              {
                  $data['imagecover'] = self::$imageImpMetier->addImage($data['imageCover']);

              }
          }*/

        if (!(self::$idaoImpAdmin->FindByMail($data['email'], self::CLASSNAMEADMIN))) {
            $admin = self::$idaoImpAdmin->RegisterAdmin($data);
            return $admin;

        } else
            return null;
    }


    public function getAdmin($id)
    {
        // TODO: Implement getAgent() method.
        return self::$idaoImpAdmin->findById(self::CLASSNAMEADMIN, $id);

    }
}