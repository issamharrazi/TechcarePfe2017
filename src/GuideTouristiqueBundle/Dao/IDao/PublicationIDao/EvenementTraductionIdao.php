<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 18:36
 */

namespace GuideTouristiqueBundle\Dao\IDao\PublicationIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface EvenementTraductionIdao extends GenericIDao
{

    public function addEvenementTraduction($EvenementTraduction);

    public function updateEvenementTraduction($oldEvenementTraduction, $newEvenementTraduction);

}