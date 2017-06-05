<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 27/05/2017
 * Time: 03:00
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface GenericAdminIdao extends GenericIDao
{

    public function RegisterAdmin($document);

}