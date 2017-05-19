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

    public function addTypeClientVente($tp);

    public function addTypeClientVenteTraduction($tp);

    public function findAllActivatedByLang($class, $lang);


    public function updateTypeClientVenteTraduction($oldtp, $newtp);


}