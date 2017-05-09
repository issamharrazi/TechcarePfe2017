<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 18:23
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface CpackImageIdao extends GenericIDao
{


    public function addCpackImage($document);

    public function updateCpackImage($document, $data);
}