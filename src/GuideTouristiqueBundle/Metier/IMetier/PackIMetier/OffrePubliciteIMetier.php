<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 23:42
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffrePubliciteIMetier
{
    public function addOffrePublicite($requestContent);

    public function updateOffrePublicite($requestContent);

    public function deleteOffrePublicite($id);

    public function getAllOffrePublicite();

    public function getOffrePublicite($id);

}