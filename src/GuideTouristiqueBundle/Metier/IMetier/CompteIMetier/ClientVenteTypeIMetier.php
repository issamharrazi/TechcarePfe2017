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
    ///////////////////add////////////////////////
    public function addClientVenteType($requestContent);

    public function addClientVenteTypeTraduction($requestContent);


    public function updateClientVenteTypeTraduction($requestContent);

    public function deleteClientVenteType($id);


    public function getClientVenteType($id);


    ////////////////////get all////////////////////////////
    public function getAllClientVenteType();

    public function getAllClientVenteTypeByLang($nomLang);

    public function getAllActivatedClientVenteTypesByLang($nomLang);


}