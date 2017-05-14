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
    protected static $EvenementTraductionImpMetier;
    protected static $commentaireImpMetier;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\EvenementIdao $idaoImpEvenement, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\EvenementTraductionIMetier $EvenementTraductionImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CommentaireIMetier $commentaireImpMetier)
    {


        self::$idaoImpEvenement = $idaoImpEvenement;


        self::$etatImpMetier = $etatImpMetier;
        self::$EvenementTraductionImpMetier = $EvenementTraductionImpMetier;
        self::$commentaireImpMetier = $commentaireImpMetier;


    }


    public function addEvenement($requestContent)
    {
        // TODO: Implement addEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        for ($i = 0; $i < count($data['evenementtraduction']); $i++) {

            $data['evenementtraduction'][$i] = self::$EvenementTraductionImpMetier->addEvenementTraduction($data['evenementtraduction'][$i]);
        }


        $evenement = self::$idaoImpEvenement->addEvenement($data);

        return $evenement;
    }

    public function addCommentaireEvenement($data)
    {
        // TODO: Implement addCommentaireEvenement() method.
        $data['commentaire'] = static::$commentaireImpMetier->addCommentaire($data['commentare']);
        $evenement = self::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $data['evenement']['id']);

        static::$idaoImpEvenement->addCommentaireEvenement($evenement, $data);

    }

    public function updateCommentaireEvenement($data)
    {
        // TODO: Implement updateCommentaireEvenement() method.
    }

    public function updateEvenement($data)
    {
        // TODO: Implement updateEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $evenement = self::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $data['id']);
        return self::$idaoImpEvenement->updateEvenement($evenement, $data);

    }

    public function deleteEvenement($id)
    {
        // TODO: Implement deleteEvenement() method.
        $evenement = self::$idaoImpEvenement->findById(self::CLASSNAMEEVENEMENT, $id);


        self::$idaoImpEvenement->delete($evenement);

    }

    public function getAllEvenements()
    {
        // TODO: Implement getAllEvenements() method.
        $evenements = self::$idaoImpEvenement->findAll(self::CLASSNAMEEVENEMENT);


        return $evenements;
    }

    public function findAllActivatedEvenements()
    {
        // TODO: Implement findAllActivatedEvenements() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $evenements = static::$idaoImpEvenement->findAllActivated(self::CLASSNAMEEVENEMENT);

        return $evenements;
    }

    public function getEvenement($id)
    {
        // TODO: Implement getEvenement() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $evenements = static::$idaoImpEvenement->findAllActivated(self::CLASSNAMEEVENEMENT);

        return $evenements;
    }
}