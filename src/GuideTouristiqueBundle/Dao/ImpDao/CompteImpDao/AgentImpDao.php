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
use GuideTouristiqueBundle\Document\Admin;
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

    public function RegisterAgent($data)
    {
        $agent = new Admin();
        $agent->setEmail($data['email']);
        $agent->setPlainPassword($data['password']);
        $agent->setEnabled(true);
        // $agent->setNom($data['nom']);
        //  $agent->setPrenom($data['prenom']);
        // $agent->setChefequipe(null);


        $agent->addRole('ROLE_AGENT');
        $agent->setEtat($data['etat']);
        $agent->setEtattemporaire($data['etat']);
        try {


            static::$documentManager->persist($agent);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $agent;

        // TODO: Implement RegisterAgent() method.
    }

    public function UpdateAgent($agent, $data)
    {
        $agent->setEmail($data['email']);
        $agent->setPlainPassword($data['password']);
        $agent->setNom($data['nom']);
        $agent->setPrenom($data['prenom']);
        $agent->setImage($data['image']);
        $agent->setNumtel($data['numtel']);
        $agent->setAdresse($data['adresse']);


        // $clientAchat->setChefequipe($data['chefequipe']);


        $agent->setEtat($data['etat']);
        $agent->setEtattemporaire($data['etattemporaire']);
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