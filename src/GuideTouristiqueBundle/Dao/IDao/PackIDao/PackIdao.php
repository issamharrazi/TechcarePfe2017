<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 12/04/2017
 * Time: 10:21
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface PackIdao extends GenericIDao
{
    public function addPack($pack);

    public function updatePack($oldPack, $newPack);

}