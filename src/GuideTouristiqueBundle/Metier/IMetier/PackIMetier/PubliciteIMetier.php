<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 14:52
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface PubliciteIMetier
{

    public function addPublicite($requestContent);

    public function updatePublicite($requestContent);

    public function deletePublicite($id);

    public function getAllPublicites();

    public function getPublicite($id);

}