<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 13:14
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\TacheImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\TacheIMetier\TacheIMetier;

class TacheImpMetier implements TacheIMetier
{

    const CLASSNAMETACHE = 'Tache';
    protected static $idaoImpTache;
    protected static $metierImpUser;
    protected static $etatImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\TacheIDao\TacheIdao $idaoImpTache, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\UserIMetier $serviceUserImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpTache = $idaoImpTache;

        self::$metierImpUser = $serviceUserImpMetier;

        self::$etatImpMetier = $etatImpMetier;


    }


    public function addTache($requestContent)
    {
        // TODO: Implement addTache() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        //   $data['user'] = self::$metierImpUser->addImage($data['image']);


        $tache = self::$idaoImpTache->addTache($data);

        return $tache;

    }

    public function updateTache($data)
    {
        // TODO: Implement updateTache() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        // TODO: Implement updateCategorie() method.
        //  $data['user'] = self::$metierImpImage->updateImage($data['image']);

        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);
        return self::$idaoImpTache->updateTache($tache, $data);

    }

    public function deleteTache($id)
    {
        // TODO: Implement deleteTache() method.
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $id);
        // self::$metierImpUser->deleteImage($categorie->getImage()->getId());


        self::$idaoImpTache->delete($tache);

    }

    public function getAllTaches()
    {
        // TODO: Implement getAllTaches() method.
        $taches = self::$idaoImpTache->findAll(self::CLASSNAMETACHE);


        return $taches;
    }

    public function findAllActivatedTaches()
    {
        // TODO: Implement findAllActivatedTaches() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $taches = static::$idaoImpTache->findAllActivated(self::CLASSNAMETACHE);

        return $taches;
    }

    public function getTache($id)
    {
        // TODO: Implement getTache() method.
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $id);


        return $tache;
    }
}