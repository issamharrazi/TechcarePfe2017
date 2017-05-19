<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 10:45
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface AdresseIMetier
{
    public function addAdresse($requestContent);

    public function updateAdresse($requestContent);

    public function deleteAdresse($id);

    public function getAllAdresses();

    public function getAdresse($id);


}