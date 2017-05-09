<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:56
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;


use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface CpackVideoIdao extends GenericIDao
{

    public function addCpackVideo($document);

    public function updateCpackVideo($document, $data);

}