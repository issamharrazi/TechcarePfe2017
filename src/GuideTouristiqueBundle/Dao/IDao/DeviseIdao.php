<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 21:38
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface DeviseIdao extends GenericIDao
{
    public function addDevise($document);

    public function updateDevise($document, $data);

}