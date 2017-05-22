<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 02:26
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface ChefEquipeIMetier
{

    public function addChefEquipe($requestContent);

    public function UpdateChefEquipe($requestContent);


    public function addClientVenteAuChefEquipe($clientVente, $ChefEquipe);

    public function addClientAchatAuChefEquipe($clientAchat, $ChefEquipe);

    public function addTacheAuChefEquipe($tache, $ChefEquipe);

    public function addTacheAffecteeAuChefEquipe($tacheAffectee, $ChefEquipe);

    public function addTacheAgentAuChefEquipe($agent, $ChefEquipe);


    public function addClientVenteTemporaireAuChefEquipe($clientVenteTemporaire, $ChefEquipe);

    public function addClientAchaTemporairetAuChefEquipe($clientAchatTemporaire, $ChefEquipe);

    public function addAgentTemporaireAuChefEquipe($agentTemporaire, $ChefEquipe);

    public function addTacheAffecteeTemporaireAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe);


    public function deleteChefEquipe($id);

    public function getAllChefsEquipe();

    public function findAllActivatedChefsEquipe();

    public function getChefEquipe($id);


}