<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 21:52
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreImageIMetier;

class OffreImageImpMetier implements OffreImageIMetier
{

    const CLASSNAMEOFFREIMAGE = 'OffreImage';
    protected static $daoImpOffreImage;
    protected static $metierImpImage;
    protected static $metierImpDuree;
    protected static $etatImpMetier;
    protected static $deviseImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreImageIdao $daoImpImage, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DureeIMetier $serviceDureeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier $deviseImpMetier)
    {


        self::$daoImpOffreImage = $daoImpImage;
        self::$metierImpImage = $serviceImageImpMetier;
        self::$metierImpDuree = $serviceDureeImpMetier;
        self::$etatImpMetier = $etatImpMetier;
        self::$deviseImpMetier = $deviseImpMetier;


    }


    public function addOffreImage($data)
    {
        // TODO: Implement addOffreImage() method.

        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);
        $data['duree'] = self::$metierImpDuree->addDuree($data['duree']);

        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);


        $offreImg = self::$daoImpOffreImage->addOffreImage($data);

        return $offreImg;

    }

    public function updateOffreImage($data)
    {
        // TODO: Implement updateOffreImage() method.
        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['duree'] = self::$metierImpDuree->updateDuree($data['duree']);
        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);

        $offreFT = self::$daoImpOffreImage->findById(self::CLASSNAMEOFFREIMAGE, $data['id']);

        return self::$daoImpOffreImage->updateOffreImage($offreFT, $data);
    }

    public function deleteOffreImage($id)
    {
        // TODO: Implement deleteOffreImage() method.

        $offreImg = self::$daoImpOffreImage->findById(self::CLASSNAMEOFFREIMAGE, $id);
        self::$metierImpImage->deleteImage($offreImg->getImage()->getId());
        self::$metierImpDuree->deleteDuree($offreImg->getDuree()->getId());
        self::$deviseImpMetier->deleteDevise($offreImg->getDevise()->getId());


        self::$daoImpOffreImage->delete($offreImg);
    }

    public function getAllOffreImage()
    {
        // TODO: Implement getAllOffreImage() method.

        $offresImg = self::$daoImpOffreImage->findAll(self::CLASSNAMEOFFREIMAGE);


        return $offresImg;

    }

    public function getOffreImage($id)
    {
        // TODO: Implement getOffreImage() method.
        $offreImg = self::$daoImpOffreImage->findById(self::CLASSNAMEOFFREIMAGE, $id);


        return $offreImg;
    }


    public function findAllActivatedOffreImage()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $offresImg = static::$daoImpOffreImage->findAllActivated(self::CLASSNAMEOFFREIMAGE);

        return $offresImg;
    }
}