<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 00:20
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface FicheTechniqueIMetier
{

    public function addFicheTechnique($requestContent);

    public function updateFicheTechnique($requestContent);

    public function deleteFicheTechnique($id);

    public function getAllFicheTechnique();

    public function getFicheTechnique($id);

}