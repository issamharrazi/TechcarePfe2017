<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:10
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface AdminIMetier
{
    public function login($requestContent);

    public function addAdmin($requestContent);

    public function updateAdmin($requestContent);

    public function deleteAdmin($id);

    public function getAllAdmin();

    public function findAllActivatedAdmins();

    public function getAdmin($id);

}