<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 21:50
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreVideoIMetier
{

    public function addOffreVideo($requestContent);

    public function updateOffreVideo($requestContent);

    public function deleteOffreVideo($id);

    public function getAllOffreVideo();

    public function getOffreVideo($id);
}