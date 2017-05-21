<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 01:37
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface ChefEquipeIdao extends GenericIDao
{
    public function addClientVenteAuChefEquipe($clientVente, $ChefEquipe);

    public function addClientAchatAuChefEquipe($clientAchat, $ChefEquipe);

    public function addTacheAuChefEquipe($tache, $ChefEquipe);

    public function addTacheAffecteeAuChefEquipe($tacheAffectee, $ChefEquipe);

    public function addTacheAgentAuChefEquipe($agent, $ChefEquipe);


    public function addClientVenteTemporaireAuChefEquipe($clientVenteTemporaire, $ChefEquipe);

    public function addClientAchaTemporairetAuChefEquipe($clientAchatTemporaire, $ChefEquipe);

    public function addAgentTemporaireAuChefEquipe($agentTemporaire, $ChefEquipe);

    public function addTacheAffecteeTemporaireAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe);


    public function RegisterChefEquipe($document);

    public function UpdateChefEquipe($document, $data);


}