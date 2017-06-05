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
    protected static $metierImpAdmin;
    protected static $etatImpMetier;
    protected static $etatRealisationImpMetier;
    protected static $chefEquipeImpMetier;
    protected static $agentImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\TacheIDao\TacheIdao $idaoImpTache, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ChefEquipeIMetier $chefEquipeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\AgentIMetier $agentImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\GenericAdminIMetier $adminImpMetier)
    {

        self::$idaoImpTache = $idaoImpTache;
        self::$agentImpMetier = $agentImpMetier;
        self::$chefEquipeImpMetier = $chefEquipeImpMetier;
        self::$metierImpAdmin = $adminImpMetier;


        self::$etatImpMetier = $etatImpMetier;

    }


    public function addTache($data)
    {
        // TODO: Implement addTache() method.

        if (isset($data['agent'])) {
            $data['agent'] = json_decode($data['agent'], true);
            $data['agent'] = self::$agentImpMetier->getAgent($data['agent']['id']);

        }


        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        if ($data['addbychefequipe'] == '1') {
            $data['chefequipe'] = self::$chefEquipeImpMetier->getChefEquipe($data['chefequipe']["id"]);

        } else {
            $chefequipe = json_decode($data['chefequipe'], true);

            $data['chefequipe'] = self::$chefEquipeImpMetier->getChefEquipe($chefequipe["id"]);
        }


        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum(1);
        // dump($data['etattemporaire']);
        $tache = self::$idaoImpTache->addTache($data);


        return $tache;

    }

    public function updateTache($data)
    {

        dump($data);

        // TODO: Implement updateTache() method.

        // var_dump($data['fichierrelie']);
        if ($data['modifchefequipe'] == '1') {

            $chefequipe = json_decode($data['chefequipe'], true);

            $data['chefequipe'] = self::$chefEquipeImpMetier->getChefEquipe($chefequipe["id"]);
        } else
            $data['chefequipe'] = self::$chefEquipeImpMetier->getChefEquipe($data['chefequipe']["id"]);


        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etattemporaire']['num']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        if (isset($data['agent'])) {
            $data['agent'] = self::$agentImpMetier->getAgent($data['agent']['id']);
        }


        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);

        return self::$idaoImpTache->updateTache($tache, $data);

    }

    public function deleteTache($id)
    {
        // TODO: Implement deleteTache() method.
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $id);


        self::$idaoImpTache->deleteTache($tache);

    }

    public function getAllTaches($idAdmin)
    {


        $admin = self::$metierImpAdmin->getAdmin($idAdmin);


        if (in_array("ROLE_SUPER_ADMIN", $admin->getRoles()))
            $taches = self::$idaoImpTache->findAll(self::CLASSNAMETACHE);
        elseif (in_array("ROLE_CHEFEQUIPE", $admin->getRoles()))
            $taches = static::$idaoImpTache->getActivatedTaskofChefEquipe($idAdmin);
        elseif (in_array("ROLE_AGENT", $admin->getRoles()))
            $taches = static::$idaoImpTache->getActivatedTaskofAgent($idAdmin);

        // TODO: Implement getAllTaches() method.


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

    public function changerEtatTache($data)
    {
        // TODO: Implement changerEtatTache() method.
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);

        return self::$idaoImpTache->changerEtatTache($tache, $data);

    }


    public function changerTemporairementEtatTache($data)
    {
        // TODO: Implement changerEtatTache() method.
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etattemporaire']['num']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);

        return self::$idaoImpTache->changerEtatTache($tache, $data);

    }

    public function findAllStateChangesByChefEquipe()
    {
        // TODO: Implement findAllStateChangesByChefEquipe() method.


        $taches = static::$idaoImpTache->getTacheChangedByChefEquipe();

        return $taches;
    }


    public function modifierchangementEtatTache($data)
    {
        // TODO: Implement modifierchangementEtatTache() method.
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etattemporaire']['num']);

        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);

        return self::$idaoImpTache->changerEtatTache($tache, $data);
    }

    public function uploadRealizedTask($data)
    {
        // TODO: Implement uploadRealizedTask() method.
        $tache = self::$idaoImpTache->findById(self::CLASSNAMETACHE, $data['id']);

        return self::$idaoImpTache->uploadRealizedTask($tache, $data);

    }
}