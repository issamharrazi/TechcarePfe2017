<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 00:06
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface ImageIdao extends GenericIDao
{
    public function addImage($image);

    public function updateImage($oldImage, $newImage);

    public function findImageBYMedia($media);



}