<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 14:24
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface TypeClientIdao extends GenericIDao
{

    public function addTypeClientVente($document);

    public function updateTypeClientVente($document, $data);


}