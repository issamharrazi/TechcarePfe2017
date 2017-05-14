<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 21:02
 */

namespace GuideTouristiqueBundle\Dao\IDao\PublicationIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface ActualiteTradutionIdao extends GenericIDao
{
    public function addActualitesTraduction($actualitesTraduction);

    public function updateActualitesTraduction($oldActualitesTraduction, $newActualitesTraduction);

}