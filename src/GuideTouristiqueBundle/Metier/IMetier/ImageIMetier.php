<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 01:11
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface ImageIMetier
{

    public function addImage($requestContent);

    public function updateImage($requestContent);

    public function deleteImage($id);

    public function getAllImages();

    public function getImage($id);
}