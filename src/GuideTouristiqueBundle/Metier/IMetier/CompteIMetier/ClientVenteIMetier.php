<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 19:49
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface ClientVenteIMetier
{

    public function addClientVente($requestContent);

    public function addClientAchatAuClientVente($clientVente, $clientAchat);

    public function DesactiveClientVenteTemporairement($clientVente, $data);

    public function UpdateNbreVisiteClientVente($clientVente, $nbreVisite);

    public function UpdateChefEquipeClientVente($clientVente, $chefEquipe);


    public function updateClientVente($requestContent);

    public function deleteClientVente($id);

    public function getAllClientsVente();

    public function findAllActivatedClientsVente();

    public function getClientVente($id);

}