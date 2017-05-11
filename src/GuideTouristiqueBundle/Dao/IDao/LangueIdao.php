<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 10:12
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface LangueIdao extends GenericIDao
{

    public function addLangue($etat);

    public function updateLangue($oldLangue, $newLangue);

    public function findLangueByName($class, $name);

}