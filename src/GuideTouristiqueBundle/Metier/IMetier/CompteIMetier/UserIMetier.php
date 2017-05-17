<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 13:37
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;
interface UserIMetier
{
    public function login($requestContent);

    public function addUser($requestContent);

    public function updateUser($requestContent);

    public function deleteUser($id);

    public function getAllUser();

    public function findAllActivatedUsers();

    public function getUser($id);



}