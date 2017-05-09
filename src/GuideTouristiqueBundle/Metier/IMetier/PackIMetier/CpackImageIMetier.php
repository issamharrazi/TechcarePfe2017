<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 18:50
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CpackImageIMetier
{


    public function addCpackImage($requestContent);

    public function updateCpackImage($requestContent);

    public function deleteCpackImage($id);

    public function getAllCpackImage();

    public function getCpackImage($id);
}