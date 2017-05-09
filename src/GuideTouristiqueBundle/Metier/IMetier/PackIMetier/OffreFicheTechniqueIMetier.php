<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 01:54
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface OffreFicheTechniqueIMetier
{

    public function addOffreFicheTechnique($requestContent);

    public function updateOffreFicheTechnique($requestContent);

    public function deleteOffreFicheTechnique($id);

    public function getAllOffreFicheTechnique();

    public function getOffreFicheTechnique($id);

    public function findAllActivatedOffresFicheTechnique();
}