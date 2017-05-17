<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/2017
 * Time: 18:14
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface UserIDao extends GenericIDao
{
    public function findUserByUsername($class, $username);

    public function addUser($document);

    public function RegisterUser($document);

    public function updateUser($document, $data);


}