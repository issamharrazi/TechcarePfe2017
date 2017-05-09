<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 22:27
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface DureeIdao extends GenericIDao
{

    public function addDuree($document);

    public function updateDuree($document, $data);
}