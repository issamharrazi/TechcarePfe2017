<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:07
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface OffreIdao extends GenericIDao
{
    public function addOffre($offre);

    public function updateOffre($oldoffre, $newOffre);

}