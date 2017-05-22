<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 03:51
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\SuperAdminIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Admin;


class SuperAdminImpDao extends GenericImplDao implements SuperAdminIdao
{

    public function RegisterSuperAdmin($data)
    {
        // TODO: Implement RegisterSuperAdmin() method.
        $SuperAdmin = new Admin();
        // $clientAchat->setUsername($data['username']);
        $SuperAdmin->setEmail($data['email']);
        // $clientAchat->setPassword($data['password']);

        $SuperAdmin->setPlainPassword($data['password']);
        $SuperAdmin->setEnabled(true);
        // $clientAchat->setNom($data['nom']);
        //  $clientAchat->setPrenom($data['prenom']);
        // $clientAchat->setChefequipe(null);
        $SuperAdmin->setEtat($data['etat']);


        $SuperAdmin->addRole('ROLE_SUPER_ADMIN');
        try {


            static::$documentManager->persist($SuperAdmin);

            static::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $SuperAdmin;
    }

    public function UpdateSuperAdmin($SuperAdmin, $data)
    {
        // TODO: Implement UpdateSuperAdmin() method.

        $SuperAdmin->setEmail($data['email']);
        $SuperAdmin->setPlainPassword($data['password']);
        $SuperAdmin->setNom($data['nom']);
        $SuperAdmin->setPrenom($data['prenom']);
        $SuperAdmin->setImage($data['image']);
        $SuperAdmin->setNumtel($data['numtel']);
        $SuperAdmin->setAdresse($data['adresse']);


        // $clientAchat->setChefequipe($data['chefequipe']);


        try {


            $SuperAdmin = static::$documentManager->merge($SuperAdmin);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $SuperAdmin;
    }
}