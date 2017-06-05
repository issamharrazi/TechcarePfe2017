<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 19:19
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\AgentIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Agent;
use GuideTouristiqueBundle\Document\ClientAchat;


class AgentImpDao extends GenericImplDao implements AgentIdao
{

    public function addTacheAuAgent($tache, $agent)
    {

        // TODO: Implement addTacheAuAgent() method.
        $agent->addTachesaffectee($tache);


        try {


            static::$documentManager->merge($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function UpdateAgent($agent, $data)
    {
        $agent->setEmail($data['email']);
        $agent->setPlainPassword($data['password']);
        $agent->setNom($data['nom']);
        $agent->setPrenom($data['prenom']);
        if (isset($data['image']))
            $agent->setImage($data['image']);
        if (isset($data['imageCover']))
            $agent->setImageCover($data['imageCover']);
        $agent->setUsername($data['username']);
        $agent->setSexe($data['sexe']);
        $agent->setAboutme($data['aboutme']);
        //$chefEquipe->setSkills();
        $agent->setNumtel($data['numtel']);
        if (isset($data['adresse']))
            $agent->setAdresse($data['adresse']);


        // $clientAchat->setChefequipe($data['chefequipe']);

        /*
                if(isset($data['etattemporaire']))
                    $agent->setEtattemporaire($data['etattemporaire']);*/
        try {


            $agent = static::$documentManager->merge($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $agent;
        // TODO: Implement UpdateAgent() method.
    }

    public function UpdateChefEquipeAgent($agent, $chefEquipe)
    {

        // TODO: Implement UpdateChefEquipeAgent() method.
        $agent->setChefequipe($chefEquipe);


        try {


            static::$documentManager->merge($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }

    public function removeTacheAuAgent($tache, $agent)
    {
        // TODO: Implement removeTacheAuAgent() method.

        $agent->removeTachesaffectee($tache);


        try {


            static::$documentManager->merge($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function DesactiveAgentTemporairement($agent, $data)
    {
        // TODO: Implement DesactiveAgentTemporairement() method.
        $agent->setEtattemporaire($data['etattemporaire']);


        try {


            static::$documentManager->merge($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}