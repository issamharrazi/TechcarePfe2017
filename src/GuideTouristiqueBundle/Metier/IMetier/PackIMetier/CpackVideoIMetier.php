<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 20:05
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CpackVideoIMetier
{
    public function addCpackVideo($requestContent);

    public function updateCpackVideo($requestContent);

    public function deleteCpackVideo($id);

    public function getAllCpackVideo();

    public function getCpackVideo($id);

}