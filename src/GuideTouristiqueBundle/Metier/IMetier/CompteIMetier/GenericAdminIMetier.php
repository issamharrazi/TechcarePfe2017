<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 27/05/2017
 * Time: 03:10
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface GenericAdminIMetier
{
    public function loginAdmin($requestContent);

    public function addAdmin($requestContent);

    public function getAdmin($id);


}