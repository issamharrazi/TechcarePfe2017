<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 11:35
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface ResponsableIdao extends GenericIDao
{
    public function addResponsable($tp);

    public function updateResponsable($oldtp, $newtp);


}