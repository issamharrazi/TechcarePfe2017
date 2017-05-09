<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 12/04/2017
 * Time: 10:40
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface PackIMetier
{
    public function addPACK($requestContent);

    public function updatePACK($requestContent);

    public function deletePACK($id);

    public function getAllPACK();

    public function getPACK($id);

}