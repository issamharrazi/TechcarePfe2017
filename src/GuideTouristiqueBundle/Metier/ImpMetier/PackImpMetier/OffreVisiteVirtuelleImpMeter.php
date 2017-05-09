<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 02:11
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreVisiteVirtuelleIMetier;

class OffreVisiteVirtuelleImpMeter implements OffreVisiteVirtuelleIMetier
{

    const CLASSNAMEOFFREVISITEVIRTUELLE = 'OffreVisiteVirtuelle';
    protected static $daoImpOffreVisiteVirtuelle;
    protected static $metierImpImage;
    protected static $metierImpDuree;
    protected static $etatImpMetier;
    protected static $deviseImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreVisiteVirtuelleIdao $daoImpVisiteVirtuelle, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DureeIMetier $serviceDureeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier $deviseImpMetier)
    {


        self::$daoImpOffreVisiteVirtuelle = $daoImpVisiteVirtuelle;
        self::$metierImpImage = $serviceImageImpMetier;
        self::$metierImpDuree = $serviceDureeImpMetier;
        self::$etatImpMetier = $etatImpMetier;
        self::$deviseImpMetier = $deviseImpMetier;


    }


    public function addOffreVisiteVirtuelle($data)
    {
        // TODO: Implement addOffreVisiteVirtuelle() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);
        $data['duree'] = self::$metierImpDuree->addDuree($data['duree']);

        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);


        $offreFT = self::$daoImpOffreVisiteVirtuelle->addOffreVisiteVirtuelle($data);

        return $offreFT;

    }

    public function updateOffreVisiteVirtuelle($data)
    {
        // TODO: Implement updateOffreVisiteVirtuelle() method.
        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['duree'] = self::$metierImpDuree->updateDuree($data['duree']);
        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);

        $offreFT = self::$daoImpOffreVisiteVirtuelle->findById(self::CLASSNAMEOFFREVISITEVIRTUELLE, $data['id']);

        return self::$daoImpOffreVisiteVirtuelle->updateOffreVisiteVirtuelle($offreFT, $data);

    }

    public function deleteOffreVisiteVirtuelle($id)
    {
        // TODO: Implement deleteOffreVisiteVirtuelle() method.
        $offreFT = self::$daoImpOffreVisiteVirtuelle->findById(self::CLASSNAMEOFFREVISITEVIRTUELLE, $id);
        self::$metierImpImage->deleteImage($offreFT->getImage()->getId());
        self::$metierImpDuree->deleteDuree($offreFT->getDuree()->getId());
        self::$deviseImpMetier->deleteDevise($offreFT->getDevise()->getId());


        self::$daoImpOffreVisiteVirtuelle->delete($offreFT);

    }

    public function getAllOffreVisiteVirtuelle()
    {
        // TODO: Implement getAllOffreVisiteVirtuelle() method.
        $offresFT = self::$daoImpOffreVisiteVirtuelle->findAll(self::CLASSNAMEOFFREVISITEVIRTUELLE);


        return $offresFT;
    }

    public function getOffreVisiteVirtuelle($id)
    {
        // TODO: Implement getOffreVisiteVirtuelle() method.
        $offreFT = self::$daoImpOffreVisiteVirtuelle->findById(self::CLASSNAMEOFFREVISITEVIRTUELLE, $id);


        return $offreFT;
    }

    public function findAllActivatedVisiteVirtuelle()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $offresFT = static::$daoImpOffreVisiteVirtuelle->findAllActivated(self::CLASSNAMEOFFREVISITEVIRTUELLE);

        return $offresFT;
    }
}