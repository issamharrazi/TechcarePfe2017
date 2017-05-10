<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:40
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface CpackVisiteVirtuelleIdao extends GenericIDao
{
    public function addCpackVisiteVirtuelle($document);

    public function updateCpackVisiteVirtuelle($document, $data);


}