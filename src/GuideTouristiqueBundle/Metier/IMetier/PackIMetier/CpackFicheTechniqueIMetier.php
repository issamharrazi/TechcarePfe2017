<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 10:42
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CpackFicheTechniqueIMetier
{

    public function addCpackFicheTechnique($requestContent);

    public function updateCpackFicheTechnique($requestContent);

    public function deleteCpackFicheTechnique($id);

    public function getAllCpackFicheTechnique();

    public function getCpackFicheTechnique($id);
}