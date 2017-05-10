<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:09
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface VisiteVirtuelleIMetier
{
    public function addVisiteVirtuelle($requestContent);

    public function updateVisiteVirtuelle($requestContent);

    public function deleteVisiteVirtuelle($id);

    public function getAllVisiteVirtuelles();

    public function getVisiteVirtuelle($id);

}