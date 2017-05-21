<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 19:15
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface AgentIdao extends GenericIDao
{
    public function addTacheAuAgent($tache, $agent);

    public function removeTacheAuAgent($tache, $agent);


    public function RegisterAgent($document);

    public function UpdateAgent($document, $data);

    public function UpdateChefEquipeAgent($document, $chefEquipe);

    public function DesactiveAgentTemporairement($agent, $data);


}