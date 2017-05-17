<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/2017
 * Time: 18:09
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\UserIDao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\User;

class UserImpDao extends GenericImplDao implements UserIDao
{

    public function findUserByUsername($class, $username)
    {
        // TODO: Implement findByUsername() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findOneBy(['username' => $username, 'etat.id' => 1]);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }

    public function addUser($data)
    {
        $user = new User();
        // TODO: Implement addUser() method.
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setPlainPassword($data['password']);
        //  $user->setPrenom($data['prenom']);
        // $user->setNumTel($data['numtel']);
        $user->addRole($data['role']);
        $user->setEtat($data['etat']);
        try {


            $user = static::$documentManager->merge($user);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $user;
    }

    public function updateUser($user, $data)
    {

        // TODO: Implement updateUser() method.
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setPlainPassword($data['password']);
        $user->setPrenom($data['prenom']);
        $user->setNumTel($data['numtel']);
        $user->setRoles($data['role']);
        $user->setEtat($data['etat']);


        $user = self::$documentManager->merge($user);
        self::$documentManager->flush();


        return $user;
    }

    public function RegisterUser($data)
    {
        // TODO: Implement RegisterUser() method.
        //     $user = new User($data['username'], $data['email'], $data['password'],$data['role'],true,$data['etat']);
        try {


            //       $user = static::$documentManager->merge($user);
            //     static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        //return $user;
    }
}