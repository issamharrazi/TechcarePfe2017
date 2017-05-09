<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 21:49
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreImageIMetier
{
    public function addOffreImage($requestContent);

    public function updateOffreImage($requestContent);

    public function deleteOffreImage($id);

    public function getAllOffreImage();

    public function getOffreImage($id);


}