<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 19:42
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface AgentIMetier
{
    public function addAgent($requestContent);

    public function addTacheAuAgent($agent, $tache);

    public function removeTacheAuAgent($agent, $tache);

    public function DesactiveAgentTemporairement($agent, $data);

    public function UpdateChefEquipeAgent($agent, $chefEquipe);


    public function updateAgent($requestContent);

    public function deleteAgent($id);

    public function getAllAgents();

    public function findAllActivatedAgents();

    public function getAgent($id);

}