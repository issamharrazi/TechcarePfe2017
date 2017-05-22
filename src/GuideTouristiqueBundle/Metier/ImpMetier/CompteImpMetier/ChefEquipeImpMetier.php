<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 02:30
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ChefEquipeIMetier;

class ChefEquipeImpMetier implements ChefEquipeIMetier
{

    const CLASSNAMECHEFEQUIPE = 'Admin';
    protected static $idaoImpChefEquipe;
    protected static $etatImpMetier;
    protected static $adresseImpMetier;
    protected static $imageImpMetier;
    protected static $clientImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\ChefEquipeIdao $idaoImpChefEquipe, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier $adresseImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpChefEquipe = $idaoImpChefEquipe;


        self::$etatImpMetier = $etatImpMetier;
        self::$imageImpMetier = $imageImpMetier;
        //   self::$clientImpMetier = $clientImpMetier;
        self::$adresseImpMetier = $adresseImpMetier;


    }


    public function addChefEquipe($data)
    {
        // TODO: Implement addChefEquipe() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        if (!(self::$idaoImpChefEquipe->FindByMail($data['email'], self::CLASSNAMECHEFEQUIPE))) {
            $chefEquipe = self::$idaoImpChefEquipe->RegisterChefEquipe($data);
            return $chefEquipe;

        } else
            return null;


    }

    public function UpdateChefEquipe($data)
    {
        // TODO: Implement UpdateChefEquipe() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $data['adresse'] = self::$adresseImpMetier->updateAdresse($data['adresse']);


        $data['image'] = self::$imageImpMetier->updateImage($data['image']);


        $chefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $data['id']);
        return self::$idaoImpChefEquipe->UpdateChefEquipe($chefEquipe, $data);

    }

    public function addClientVenteAuChefEquipe($clientVente, $ChefEquipe)
    {
        // TODO: Implement addClientVenteAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($clientVente, $ChefEquipe);

    }

    public function addClientAchatAuChefEquipe($clientAchat, $ChefEquipe)
    {
        // TODO: Implement addClientAchatAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($clientAchat, $ChefEquipe);

    }

    public function addTacheAuChefEquipe($tache, $ChefEquipe)
    {
        // TODO: Implement addTacheAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($tache, $ChefEquipe);

    }

    public function addTacheAffecteeAuChefEquipe($tacheAffectee, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($tacheAffectee, $ChefEquipe);

    }

    public function addTacheAgentAuChefEquipe($agent, $ChefEquipe)
    {
        // TODO: Implement addTacheAgentAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($agent, $ChefEquipe);

    }

    public function addClientVenteTemporaireAuChefEquipe($clientVenteTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientVenteTemporaireAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($clientVenteTemporaire, $ChefEquipe);

    }

    public function addClientAchaTemporairetAuChefEquipe($clientAchatTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientAchaTemporairetAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($clientAchatTemporaire, $ChefEquipe);

    }

    public function addAgentTemporaireAuChefEquipe($agentTemporaire, $ChefEquipe)
    {
        // TODO: Implement addAgentTemporaireAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($agentTemporaire, $ChefEquipe);

    }

    public function addTacheAffecteeTemporaireAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeTemporaireAuChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $ChefEquipe->getId());
        return self::$idaoImpChefEquipe->addClientAchatAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe);

    }

    public function deleteChefEquipe($id)
    {
        // TODO: Implement deleteChefEquipe() method.
        $ChefEquipe = self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $id);
        self::$adresseImpMetier->deleteAdresse($ChefEquipe->getAdresse()->getId());
        self::$imageImpMetier->deleteImage($ChefEquipe->getImage()->getId());


        self::$idaoImpChefEquipe->delete($ChefEquipe);

    }

    public function getAllChefsEquipe()
    {
        // TODO: Implement getAllChefsEquipe() method.
        return self::$idaoImpChefEquipe->findAll(self::CLASSNAMECHEFEQUIPE);

    }

    public function findAllActivatedChefsEquipe()
    {
        // TODO: Implement findAllActivatedChefsEquipe() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        return static::$idaoImpChefEquipe->findAllActivated(self::CLASSNAMECHEFEQUIPE);


    }

    public function getChefEquipe($id)
    {
        // TODO: Implement getChefEquipe() method.
        return self::$idaoImpChefEquipe->findById(self::CLASSNAMECHEFEQUIPE, $id);

    }
}