<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 14:47
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface VisiteVirtuelleIdao extends GenericIDao
{
    public function addVisiteVirtuelle($visiteVirtuelle);

    public function updateVisiteVirtuelle($oldVisiteVirtuelle, $newVisiteVirtuelle);


}