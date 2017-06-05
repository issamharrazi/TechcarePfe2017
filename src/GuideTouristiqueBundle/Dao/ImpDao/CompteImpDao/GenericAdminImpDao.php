<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 27/05/2017
 * Time: 03:02
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\GenericAdminIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Admin;

class GenericAdminImpDao extends GenericImplDao implements GenericAdminIdao
{

    public function RegisterAdmin($data)
    {
        // TODO: Implement RegisterAdmin() method.
        $admin = new Admin();
        $admin->setEmail($data['email']);

        $admin->setUsername($data['username']);
        $admin->setPlainPassword($data['password']);
        $admin->setEnabled(true);
        $admin->setNom($data['nom']);
        $admin->setPrenom($data['prenom']);
        $admin->setNumTel('');
        $admin->setAboutme('');
        $admin->setSexe('');
        $admin->setImage($data['image']);
        $admin->setImageCover($data['imagecover']);

        $admin->setEtat($data['etat']);

        if ($data['role'] == "ROLE_AGENT") {
            $admin->setEtattemporaire($data['etat']);
        }

        $admin->addRole($data['role']);
        try {


            static::$documentManager->persist($admin);

            static::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $admin;
    }
}
