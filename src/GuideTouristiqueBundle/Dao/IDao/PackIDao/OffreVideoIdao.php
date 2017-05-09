<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 13:45
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface OffreVideoIdao extends GenericIDao
{
    public function addOffreVideo($offre);

    public function updateOffreVideo($offre, $data);

}