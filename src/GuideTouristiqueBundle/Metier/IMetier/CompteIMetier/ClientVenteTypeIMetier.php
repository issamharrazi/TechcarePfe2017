<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 15:06
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface ClientVenteTypeIMetier
{
    public function addClientVenteType($requestContent);

    public function updateClientVenteType($requestContent);
    public function deleteClientVenteType($id);
    public function getAllClientVenteType();

    public function getClientVenteType($id);

    public function findAllActivatedClientVenteType();



}