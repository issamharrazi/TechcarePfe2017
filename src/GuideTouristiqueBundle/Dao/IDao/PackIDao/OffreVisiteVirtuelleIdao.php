<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 02:02
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface OffreVisiteVirtuelleIdao extends GenericIDao
{
    public function addOffreVisiteVirtuelle($offre);

    public function updateOffreVisiteVirtuelle($offre, $data);


}