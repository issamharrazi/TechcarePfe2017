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
    protected static $actualiteTraductionImpMetier;
    protected static $commentaireImpMetier;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\ActualiteIdao $idaoImpActualite, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\ActualiteTraductionIMetier $actualiteTraductionImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CommentaireIMetier $commentaireImpMetier)
    {


        self::$idaoImpActualite = $idaoImpActualite;


        self::$etatImpMetier = $etatImpMetier;
        self::$actualiteTraductionImpMetier = $actualiteTraductionImpMetier;
        self::$commentaireImpMetier = $commentaireImpMetier;


    }

    public function addActualite($data)
    {
        // TODO: Implement addActualite() method.

        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        for ($i = 0; $i < count($data['actualitestraduction']); $i++) {

            $data['actualitestraduction'][$i] = self::$actualiteTraductionImpMetier->addActualiteTraduction($data['actualitestraduction'][$i]);
        }



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
        $actualite = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $id);


        return $actualite;
    }

    public function findAllActivatedActualites()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $actualites = static::$idaoImpActualite->findAllActivated(self::CLASSNAMEACTUALITE);

        return $actualites;
    }

    public function addCommentaireActualite($data)
    {
        // TODO: Implement addCommentaireActualite() method.
        $data['commentaire'] = static::$commentaireImpMetier->addCommentaire($data['commentare']);
        $actualite = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $data['actualite']['id']);

        static::$idaoImpActualite->addCommentaireActualites($actualite, $data);

    }

    public function updateCommentaireActualite($data)
    {
        /*   // TODO: Implement updateCommentaireActualite() method.
           $actualite = self::$idaoImpActualite->findById(self::CLASSNAMEACTUALITE, $data['actualite']['id']);

           $data['commentaire'] = static::$commentaireImpMetier->updateCommentaire($data['commentare']);
           static::$idaoImpActualite->updateCommentaireActualite($actualite,$data);*/


    }
}