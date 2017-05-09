<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 01:48
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface OffreFicheTechniqueIdao extends GenericIDao
{
    public function addOffreFicheTechnique($offre);

    public function updateOffreFicheTechnique($offre, $data);

}