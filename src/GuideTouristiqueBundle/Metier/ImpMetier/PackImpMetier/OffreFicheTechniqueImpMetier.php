<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 01:57
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreFicheTechniqueIMetier;

class OffreFicheTechniqueImpMetier implements OffreFicheTechniqueIMetier
{


    const CLASSNAMEOFFREFICHETECHNIQUE = 'OffreFicheTechnique';
    protected static $daoImpOffreFicheTechnique;
    protected static $metierImpImage;
    protected static $metierImpDuree;
    protected static $etatImpMetier;
    protected static $deviseImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreFicheTechniqueIdao $daoImpFicheTechnique, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DureeIMetier $serviceDureeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier $deviseImpMetier)
    {


        self::$daoImpOffreFicheTechnique = $daoImpFicheTechnique;
        self::$metierImpImage = $serviceImageImpMetier;
        self::$metierImpDuree = $serviceDureeImpMetier;
        self::$etatImpMetier = $etatImpMetier;
        self::$deviseImpMetier = $deviseImpMetier;


    }


    public function addOffreFicheTechnique($data)
    {
        //
        // TODO: Implement addCpackFicheTechnique() method.

        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);
        $data['duree'] = self::$metierImpDuree->addDuree($data['duree']);

        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);


        $offreFT = self::$daoImpOffreFicheTechnique->addOffreFicheTechnique($data);

        return $offreFT;


    }

    public function updateOffreFicheTechnique($data)
    {
        // TODO: Implement updateOffreFicheTechnique() method.
        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['duree'] = self::$metierImpDuree->updateDuree($data['duree']);
        $data['devise'] = self::$deviseImpMetier->getDevise($data['devise']['id']);

        $offreFT = self::$daoImpOffreFicheTechnique->findById(self::CLASSNAMEOFFREFICHETECHNIQUE, $data['id']);

        return self::$daoImpOffreFicheTechnique->updateOffreFicheTechnique($offreFT, $data);
    }

    public function deleteOffreFicheTechnique($id)
    {
        // TODO: Implement deleteOffreFicheTechnique() method.

        $offreFT = self::$daoImpOffreFicheTechnique->findById(self::CLASSNAMEOFFREFICHETECHNIQUE, $id);
        self::$metierImpImage->deleteImage($offreFT->getImage()->getId());
        self::$metierImpDuree->deleteDuree($offreFT->getDuree()->getId());
        self::$deviseImpMetier->deleteDevise($offreFT->getDevise()->getId());


        self::$daoImpOffreFicheTechnique->delete($offreFT);
    }

    public function getAllOffreFicheTechnique()
    {
        // TODO: Implement getAllOffreFicheTechnique() method.


        $offresFT = self::$daoImpOffreFicheTechnique->findAll(self::CLASSNAMEOFFREFICHETECHNIQUE);


        return $offresFT;
    }

    public function getOffreFicheTechnique($id)
    {
        // TODO: Implement getOffreFicheTechnique() method.
        $offreFT = self::$daoImpOffreFicheTechnique->findById(self::CLASSNAMEOFFREFICHETECHNIQUE, $id);


        return $offreFT;
    }

    public function findAllActivatedOffresFicheTechnique()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $offresFT = static::$daoImpOffreFicheTechnique->findAllActivated(self::CLASSNAMEOFFREFICHETECHNIQUE);

        return $offresFT;
    }
}