<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 10:15
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface CpackFicheTechniqueIdao extends GenericIDao
{

    public function addCpackFicheTechnique($document);

    public function updateCpackFicheTechnique($document, $data);
}