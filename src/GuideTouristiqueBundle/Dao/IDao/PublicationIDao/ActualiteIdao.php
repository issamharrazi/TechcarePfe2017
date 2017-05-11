<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 11:25
 */

namespace GuideTouristiqueBundle\Dao\IDao\PublicationIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface ActualiteIdao extends GenericIDao
{
    public function addActualites($actualites);

    public function updateActualites($oldActualites, $newActualites);


}