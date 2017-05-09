<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 14:04
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface TypePubliciteIMetier
{
    public function addTypePublicite($requestContent);

    public function updateTypePublicite($requestContent);

    public function deleteTypePublicite($id);

    public function getAllTypePublicites();

    public function getTypePublicite($id);

    public function getTypePubliciteByNum($num);

}