<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 13:46
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface PubliciteIdao extends GenericIDao
{
    public function addPublicite($document);

    public function updatePublicite($document, $data);


}