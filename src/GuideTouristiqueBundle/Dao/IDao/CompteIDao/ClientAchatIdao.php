<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 02:47
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface ClientAchatIdao extends GenericIDao
{

    public function addClientVenteAuClientAchat($clientAchat, $clientVente);


    public function RegisterClientAchat($document);

    public function UpdateClientAchat($document, $data);

    public function UpdateChefEquipeClientAchat($document, $chefEquipe);

    public function DesactiveClientAchatTemporairement($clientAchat, $data);


}