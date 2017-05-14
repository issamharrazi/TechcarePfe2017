<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 12:55
 */

namespace GuideTouristiqueBundle\Dao\IDao\TacheIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface TacheIdao extends GenericIDao
{

    public function addTache($document);

    public function updateTache($document, $data);

}