<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 23:51
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffrePubliciteIMetier;

class OffrePubliciteImpMetier implements OffrePubliciteIMetier
{
    const CLASSNAMEOFFREPUBLICITE = 'OffrePublicite';
    protected static $daoImpOffrePublicite;
    protected static $metierImpImage;
    protected static $metierImpDuree;
    protected static $etatImpMetier;
    protected static $deviseImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffrePubliciteIdao $daoImpPublicite, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DureeIMetier $serviceDureeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier $deviseImpMetier)
    {


        self::$daoImpOffrePublicite = $daoImpPublicite;
        self::$metierImpImage = $serviceImageImpMetier;
        self::$metierImpDuree = $serviceDureeImpMetier;
        self::$etatImpMetier = $etatImpMetier;
        self::$deviseImpMetier = $deviseImpMetier;


    }


    public function addOffrePublicite($data)
    {
        // TODO: Implement addOffrePublicite() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);
        $data['duree'] = self::$metierImpDuree->addDuree($data['duree']);

        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);


        $offrePub = self::$daoImpOffrePublicite->addOffrePublicite($data);

        return $offrePub;
    }

    public function updateOffrePublicite($data)
    {
        // TODO: Implement updateOffrePublicite() method.
        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['duree'] = self::$metierImpDuree->updateDuree($data['duree']);
        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);

        $offrePub = self::$daoImpOffrePublicite->findById(self::CLASSNAMEOFFREPUBLICITE, $data['id']);

        return self::$daoImpOffrePublicite->updateOffrePublicite($offrePub, $data);

    }

    public function deleteOffrePublicite($id)
    {
        // TODO: Implement deleteOffrePublicite() method.
        $offrePub = self::$daoImpOffrePublicite->findById(self::CLASSNAMEOFFREPUBLICITE, $id);
        self::$metierImpImage->deleteImage($offrePub->getImage()->getId());
        self::$metierImpDuree->deleteDuree($offrePub->getDuree()->getId());
        self::$deviseImpMetier->deleteDevise($offrePub->getDevise()->getId());


        self::$daoImpOffrePublicite->delete($offrePub);

    }

    public function getAllOffrePublicite()
    {
        // TODO: Implement getAllOffrePublicite() method.
        $offresPub = self::$daoImpOffrePublicite->findAll(self::CLASSNAMEOFFREPUBLICITE);


        return $offresPub;

    }

    public function getOffrePublicite($id)
    {
        // TODO: Implement getOffrePublicite() method.
        $offrePub = self::$daoImpOffrePublicite->findById(self::CLASSNAMEOFFREPUBLICITE, $id);


        return $offrePub;
    }


    public function findAllActivatedOffrePublicite()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $offrePub = static::$daoImpOffrePublicite->findAllActivated(self::CLASSNAMEOFFREPUBLICITE);

        return $offrePub;
    }
}