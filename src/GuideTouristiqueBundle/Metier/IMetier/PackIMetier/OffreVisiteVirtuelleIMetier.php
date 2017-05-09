<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 02:07
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreVisiteVirtuelleIMetier
{
    public function addOffreVisiteVirtuelle($requestContent);

    public function updateOffreVisiteVirtuelle($requestContent);

    public function deleteOffreVisiteVirtuelle($id);

    public function getAllOffreVisiteVirtuelle();

    public function getOffreVisiteVirtuelle($id);

    public function findAllActivatedVisiteVirtuelle();


}