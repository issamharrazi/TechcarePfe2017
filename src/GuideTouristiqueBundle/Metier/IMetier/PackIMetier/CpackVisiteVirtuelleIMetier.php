<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:49
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CpackVisiteVirtuelleIMetier
{
    public function addCpackVisiteVirtuelle($requestContent);

    public function updateCpackVisiteVirtuelle($requestContent);

    public function deleteCpackVisiteVirtuelle($id);

    public function getAllCpackVisiteVirtuelle();

    public function getCpackVisiteVirtuelle($id);


}