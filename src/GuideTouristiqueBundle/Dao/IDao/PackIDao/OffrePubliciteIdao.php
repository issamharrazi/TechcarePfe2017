<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 23:33
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface OffrePubliciteIdao extends GenericIDao
{
    public function addOffrePublicite($offre);

    public function updateOffrePublicite($offre, $data);

}