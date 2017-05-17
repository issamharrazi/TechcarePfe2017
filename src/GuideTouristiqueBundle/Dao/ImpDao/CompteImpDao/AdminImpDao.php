<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:06
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\AdminIDao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Admin;
use GuideTouristiqueBundle\Document\User;

class AdminImpDao extends GenericImplDao implements AdminIDao
{
    public function addAdmin($data)
    {
        $admin = new Admin();
        // TODO: Implement addUser() method.
        $admin->setUsername($data['username']);
        $admin->setEmail($data['email']);
        $admin->setPlainPassword($data['password']);
        //     $admin->setPrenom($data['prenom']);
        //    $admin->setNumTel($data['numtel']);
        $admin->addRole($data['role']);
        $admin->setEtat($data['etat']);
        try {


            $admin = static::$documentManager->merge($admin);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $admin;
    }


    public function findAdminByUsername($class, $username)
    {
        // TODO: Implement findUserByUsername() method.
    }

    public function RegisterAdmin($document)
    {
        // TODO: Implement RegisterUser() method.
    }

    public function updateAdmin($document, $data)
    {
        // TODO: Implement updateUser() method.
    }
}