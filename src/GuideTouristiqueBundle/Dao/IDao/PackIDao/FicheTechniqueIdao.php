<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 00:15
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;


use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface FicheTechniqueIdao extends GenericIDao
{

    public function addFicheTechnique($document);

    public function updateFicheTechnique($document, $data);
}