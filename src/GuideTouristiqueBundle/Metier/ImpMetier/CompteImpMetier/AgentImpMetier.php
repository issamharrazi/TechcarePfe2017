<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 19:54
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\AgentIMetier;

class AgentImpMetier implements AgentIMetier
{

    const CLASSNAMEAGENT = 'Admin';
    protected static $idaoImpAgent;
    protected static $etatImpMetier;
    protected static $adresseImpMetier;
    protected static $imageImpMetier;
    protected static $adminImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\AgentIdao $idaoImpAgent, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier $adresseImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpAgent = $idaoImpAgent;


        self::$etatImpMetier = $etatImpMetier;
        self::$imageImpMetier = $imageImpMetier;
        self::$adresseImpMetier = $adresseImpMetier;


    }

    public function addAgent($data)
    {
        // TODO: Implement addAgent() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        if (!(self::$idaoImpAgent->FindByMail($data['email'], self::CLASSNAMEAGENT))) {
            $agent = self::$idaoImpAgent->RegisterAgent($data);
            return $agent;

        } else
            return null;


    }

    public function addTacheAuAgent($agent, $tache)
    {
        // TODO: Implement addTacheAuAgent() method.
        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $agent->getId());
        return self::$idaoImpAgent->addTacheAuAgent($agent, $tache);

    }

    public function removeTacheAuAgent($agent, $tache)
    {
        // TODO: Implement removeTacheAuAgent() method.
        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $agent->getId());
        return self::$idaoImpAgent->removeTacheAuAgent($agent, $tache);

    }

    public function DesactiveAgentTemporairement($agent, $data)
    {
        // TODO: Implement DesactiveAgentTemporairement() method.
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum(2);
        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $data['id']);
        return self::$idaoImpAgent->DesactiveAgentTemporairement($agent, $data);

    }

    public function UpdateChefEquipeAgent($data, $chefEquipe)
    {
        // TODO: Implement UpdateChefEquipeAgent() method.
        //  $data['typetrad'] = self::$typeTradImpMetier->getClientVenteType($data['typetrad']['id']);


        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $data['id']);
        return self::$idaoImpAgent->UpdateChefEquipeAgent($agent, $data);

    }

    public function updateAgent($data)
    {
        // TODO: Implement updateAgent() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $data['adresse'] = self::$adresseImpMetier->updateAdresse($data['adresse']);


        $data['image'] = self::$imageImpMetier->updateImage($data['image']);


        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $data['id']);
        return self::$idaoImpAgent->UpdateAgent($agent, $data);

    }

    public function deleteAgent($id)
    {
        // TODO: Implement deleteAgent() method.
        $agent = self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $id);
        self::$adresseImpMetier->deleteAdresse($agent->getAdresse()->getId());
        self::$imageImpMetier->deleteImage($agent->getImage()->getId());


        self::$idaoImpAgent->delete($agent);

    }

    public function getAllAgents()
    {
        // TODO: Implement getAllAgents() method.
        return self::$idaoImpAgent->findAll(self::CLASSNAMEAGENT);

    }

    public function findAllActivatedAgents()
    {
        // TODO: Implement findAllActivatedAgents() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        return static::$idaoImpAgent->findAllActivated(self::CLASSNAMEAGENT);

    }

    public function getAgent($id)
    {
        // TODO: Implement getAgent() method.
        return self::$idaoImpAgent->findById(self::CLASSNAMEAGENT, $id);

    }
}