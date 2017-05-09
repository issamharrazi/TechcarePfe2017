<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 10:16
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface OffreMediaIdao extends GenericIDao
{
    public function addOffreMedia($offreMedia);

    public function updateOffreMedia($offreMedia, $data);

}