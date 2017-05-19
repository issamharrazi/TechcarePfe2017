<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 10:38
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface AdresseIdao extends GenericIDao
{
    public function addAdresse($document);

    public function updateAdresse($document, $data);

}