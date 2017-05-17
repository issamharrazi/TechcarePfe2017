<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:05
 */

namespace GuideTouristiqueBundle\Dao\IDao\CompteIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface AdminIDao extends GenericIDao
{
    public function findAdminByUsername($class, $username);

    public function addAdmin($document);

    public function RegisterAdmin($document);

    public function updateAdmin($document, $data);


}