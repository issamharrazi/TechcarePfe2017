<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 15:17
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface CpackPubliciteIdao extends GenericIDao
{

    public function addCpackPublicite($document);

    public function updateCpackPublicite($document, $data);

}