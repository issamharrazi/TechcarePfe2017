<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 14:25
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface ClientAchatIMetier
{

    public function addClientAchat($requestContent);

    public function addClientVenteAuClientAchat($clientVente, $clientAchat);

    public function DesactiveClientAchatTemporairement($clientVente, $data);

    public function UpdateChefEquipeClientAchat($clientVente, $chefEquipe);


    public function updateClientAchat($requestContent);

    public function deleteClientAchat($id);

    public function getAllClientsAchat();

    public function findAllActivatedClientsAchat();

    public function getClientAchat($id);

}