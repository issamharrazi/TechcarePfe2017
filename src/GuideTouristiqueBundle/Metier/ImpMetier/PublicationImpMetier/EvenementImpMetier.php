<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 01:10
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PublicationImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\EvenementIMetier;

class EvenementImpMetier implements EvenementIMetier
{

    const CLASSNAMEEVENEMENT = 'Evenement';
    protected static $idaoImpEvenement;
    protected static $etatImpMetier;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\EvenementIdao $idaoImpEvenement, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {


        self::$idaoImpEvenement = $idaoImpEvenement;


        self::$etatImpMetier = $etatImpMetier;


    }

    public function addEvenement($data)
    {
        // TODO: Implement addEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        return static::$idaoImpEvenement->addEvenement($data);
    }

    public function updateEvenement($data)
    {
        // TODO: Implement updateEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $evenement = static::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $data['id']);

        return static::$idaoImpEvenement->updateEvenement($evenement, $data);
    }

    public function deleteEvenement($id)
    {
        // TODO: Implement deleteEvenement() method.
        $evenement = static::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $id);
        static::$idaoImpEvenement->delete($evenement);
    }

    public function getAllEvenements()
    {
        // TODO: Implement getAllEvenements() method.
        return static::$idaoImpEvenement->findAll(self::CLASSNAMEEVENEMENT);

    }

    public function getEvenement($id)
    {
        // TODO: Implement getEvenement() method.
        $evenement = static::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $id);

        return $evenement;
    }

    public function findAllActivatedEvenement()
    {
        // TODO: Implement findAllActivatedEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $evenements = static::$idaoImpEvenement->findAllActivated(self::CLASSNAMEEVENEMENT);

        return $evenements;
    }
}