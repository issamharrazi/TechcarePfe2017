<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 10:15
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreMediaIMetier
{
    public function addOffreMedia($requestContent);

    public function updateOffreMedia($requestContent);

    public function deleteOffreMedia($id);

    public function getAllOffreMedia();

    public function getOffreMedia($id);

}