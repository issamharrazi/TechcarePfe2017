<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 03:58
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface SuperAdminIMetier
{


    public function updateSuperAdmin($requestContent);

    public function deleteSuperAdmin($id);

    public function getAllSuperAdmins();

    public function findAllActivatedSuperAdmins();

    public function getSuperAdmin($id);

    public function getSuperAdminByMail($mail);


}