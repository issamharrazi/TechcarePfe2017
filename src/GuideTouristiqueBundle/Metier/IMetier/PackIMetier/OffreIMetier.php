<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:20
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreIMetier
{

    public function addOffre($requestContent);

    public function updateOffre($requestContent);

    public function deleteOffre($id);

    public function getAllOffre();

    public function getOffre($id);

}