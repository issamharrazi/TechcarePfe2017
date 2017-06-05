<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 03:51
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface SuperAdminIdao extends GenericIDao
{



    public function UpdateSuperAdmin($document, $data);


}