<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 13:56
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface TypePubliciteIdao extends GenericIDao
{
    public function addTypePublicite($tp);

    public function updateTypePublicite($oldtp, $newtp);

    public function findTypePubliciteByNum($class, $num);

}