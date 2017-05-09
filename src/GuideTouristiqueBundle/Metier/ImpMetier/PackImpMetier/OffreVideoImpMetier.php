<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 21:53
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreVideoIMetier;

class OffreVideoImpMetier implements OffreVideoIMetier
{

    const CLASSNAMEOFFREVIDEO = 'OffreVideo';
    protected static $daoImpOffreVideo;
    protected static $metierImpImage;
    protected static $metierImpDuree;
    protected static $etatImpMetier;
    protected static $deviseImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreVideoIdao $daoImpVideo, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DureeIMetier $serviceDureeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier $deviseImpMetier)
    {


        self::$daoImpOffreVideo = $daoImpVideo;
        self::$metierImpImage = $serviceImageImpMetier;
        self::$metierImpDuree = $serviceDureeImpMetier;
        self::$etatImpMetier = $etatImpMetier;
        self::$deviseImpMetier = $deviseImpMetier;


    }


    public function addOffreVideo($data)
    {
        // TODO: Implement addOffreVideo() method.

        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);
        $data['duree'] = self::$metierImpDuree->addDuree($data['duree']);

        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);


        $offreVid = self::$daoImpOffreVideo->addOffreVideo($data);

        return $offreVid;

    }

    public function updateOffreVideo($data)
    {
        // TODO: Implement updateOffreVideo() method.

        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['duree'] = self::$metierImpDuree->updateDuree($data['duree']);
        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);

        $offreFT = self::$daoImpOffreVideo->findById(self::CLASSNAMEOFFREVIDEO, $data['id']);

        return self::$daoImpOffreVideo->updateOffreVideo($offreFT, $data);

    }

    public function deleteOffreVideo($id)
    {
        // TODO: Implement deleteOffreVideo() method.
        $offreVid = self::$daoImpOffreVideo->findById(self::CLASSNAMEOFFREVIDEO, $id);
        self::$metierImpImage->deleteImage($offreVid->getImage()->getId());
        self::$metierImpDuree->deleteDuree($offreVid->getDuree()->getId());
        self::$deviseImpMetier->deleteDevise($offreVid->getDevise()->getId());


        self::$daoImpOffreVideo->delete($offreVid);
    }

    public function getAllOffreVideo()
    {
        // TODO: Implement getAllOffreVideo() method.
        $offresVid = self::$daoImpOffreVideo->findAll(self::CLASSNAMEOFFREVIDEO);


        return $offresVid;
    }

    public function getOffreVideo($id)
    {
        // TODO: Implement getOffreVideo() method.
        $offreVid = self::$daoImpOffreVideo->findById(self::CLASSNAMEOFFREVIDEO, $id);


        return $offreVid;
    }

    public function findAllActivatedOffreVideo()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $offresVid = static::$daoImpOffreVideo->findAllActivated(self::CLASSNAMEOFFREVIDEO);

        return $offresVid;
    }
}