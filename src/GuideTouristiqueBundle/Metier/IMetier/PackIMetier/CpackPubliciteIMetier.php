<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 15:24
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CpackPubliciteIMetier
{


    public function addCpackPublicite($requestContent);

    public function updateCpackPublicite($requestContent);

    public function deleteCpackPublicite($id);

    public function getAllCpackPublicite();

    public function getCpackPublicite($id);
}