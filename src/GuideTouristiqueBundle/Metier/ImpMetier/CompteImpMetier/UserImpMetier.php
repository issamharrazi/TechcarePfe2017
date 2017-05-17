<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 13:35
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

use GuideTouristiqueBundle\Document\User;
use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\UserIMetier;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;


class UserImpMetier implements UserIMetier
{

    const CLASSNAMEUSER = 'User';
    protected static $idaoImpUser;
    protected static $etatImpMetier;
    protected static $security;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\UserIDao $idaoImpUser, \Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface $security, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpUser = $idaoImpUser;
        self::$security = $security;


        self::$etatImpMetier = $etatImpMetier;


    }


    public function login($data)
    {


        // TODO: Implement login() method.
        $user = self::$idaoImpUser->findUserByUsername(self::CLASSNAMEUSER, $data['username']);

        if (!$user) {
            // throw $this->createNotFoundException();

        }

        $validPassword = self::$security->isPasswordValid($data, $data['password']);

        if (!$validPassword) {
            throw new BadCredentialsException();
        }


        return $user;

    }


    public function addUser($data)
    {
        // TODO: Implement addUser() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $user = self::$idaoImpUser->addUser($data);

        return $user;
    }

    public function updateUser($data)
    {
        // TODO: Implement updateUser() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $user = self::$idaoImpUser->findById(self::CLASSNAMEUSER, $data['id']);
        return self::$idaoImpUser->updateUser($user, $data);

    }

    public function deleteUser($id)
    {
        // TODO: Implement deleteUser() method.
        $user = self::$idaoImpUser->findById(self::CLASSNAMEUSER, $id);


        self::$idaoImpUser->delete($user);

    }

    public function getAllUser()
    {
        // TODO: Implement getAllUser() method.
        $users = self::$idaoImpUser->findAll(self::CLASSNAMEUSER);


        return $users;

    }

    public function findAllActivatedUsers()
    {
        // TODO: Implement findAllActivatedUsers() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $users = static::$idaoImpUser->findAllActivated(self::CLASSNAMEUSER);

        return $users;
    }

    public function getUser($id)
    {
        // TODO: Implement getUser() method.
        $user = self::$idaoImpUser->findById(self::CLASSNAMEUSER, $id);


        return $user;
    }
}