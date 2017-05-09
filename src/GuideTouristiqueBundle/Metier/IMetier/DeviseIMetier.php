<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 21:50
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface DeviseIMetier
{
    public function addDevise($requestContent);

    public function updateDevise($requestContent);

    public function deleteDevise($id);

    public function getAllDevise();

    public function getDevise($id);

}