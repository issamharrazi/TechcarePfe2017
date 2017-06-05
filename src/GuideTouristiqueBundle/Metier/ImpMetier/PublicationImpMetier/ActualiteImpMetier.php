<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 12:06
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PublicationImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\ActualiteIMetier;

class ActualiteImpMetier implements ActualiteIMetier
{

    const CLASSNAMEACTUALITE = 'Actualite';
    protected static $idaoImpActualite;
    protected static $etatImpMetier;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\ActualiteIdao $idaoImpActualite, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {


        self::$idaoImpActualite = $idaoImpActualite;


        self::$etatImpMetier = $etatImpMetier;


    }


    public function addActualite($data)
    {
        // TODO: Implement addActualite() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        return static::$idaoImpActualite->addActualite($data);
    }

    public function updateActualite($data)
    {
        // TODO: Implement updateActualite() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $actualite = static::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $data['id']);

        return static::$idaoImpActualite->updateActualite($actualite, $data);
    }

    public function deleteActualite($id)
    {
        // TODO: Implement deleteActualite() method.
        $actualite = static::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $id);
        static::$idaoImpActualite->delete($actualite);

    }

    public function getAllActualites()
    {
        // TODO: Implement getAllActualites() method.
        return static::$idaoImpActualite->findAll(self::CLASSNAMEACTUALITE);

    }

    public function getActualite($id)
    {
        // TODO: Implement getActualite() method.
        $actualite = static::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $id);

        return $actualite;
    }

    public function findAllActivatedActualite()
    {
        // TODO: Implement findAllActivatedActualite() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $actualites = static::$idaoImpActualite->findAllActivated(self::CLASSNAMEACTUALITE);

        return $actualites;
    }
}