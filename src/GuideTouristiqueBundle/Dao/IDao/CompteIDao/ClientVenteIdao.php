<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 18:31
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface ClientVenteIdao extends GenericIDao
{

    public function addClientAchatAuClientVente($clientVente, $clientAchat);


    public function RegisterClientVente($document);

    public function UpdateClientVente($document, $data);

    public function UpdateNbreVisiteClientVente($document, $nbreVisite);

    public function UpdateChefEquipeClientVente($document, $chefEquipe);

    public function DesactiveClientVenteTemporairement($clientVente, $data);


}