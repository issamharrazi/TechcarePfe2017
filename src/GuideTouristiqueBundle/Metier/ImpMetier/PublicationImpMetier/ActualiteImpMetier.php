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

    public function addActualite($requestContent)
    {
        // TODO: Implement addActualite() method.

        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $actualite = self::$idaoImpActualite->addActualites($data);

        return $actualite;
    }

    public function updateActualite($data)
    {
        // TODO: Implement updateActualite() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        // TODO: Implement updateCategorie() method.

        $actualite = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $data['id']);
        return self::$idaoImpActualite->updateActualites($actualite, $data);

    }

    public function deleteActualite($id)
    {
        // TODO: Implement deleteActualite() method.
        $actualite = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $id);


        self::$idaoImpActualite->delete($actualite);
    }

    public function getAllActualites()
    {
        // TODO: Implement getAllActualites() method.
        $actualites = self::$idaoImpActualite->findAll(self::CLASSNAMEACTUALITE);


        return $actualites;
    }

    public function getActualite($id)
    {
        // TODO: Implement getActualite() method.
        $categorie = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $id);


        return $categorie;
    }

    public function findAllActivatedActualites()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $actualites = static::$idaoImpActualite->findAllActivated(self::CLASSNAMEACTUALITE);

        return $actualites;
    }
}