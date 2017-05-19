<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 11:38
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\ResponsableIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Responsable;


class ResponsableImpDao extends GenericImplDao implements ResponsableIdao
{


    public function addResponsable($data)
    {
        // TODO: Implement addResponsable() method.
        $resp = new Responsable($data['nom'], $data['prenom'], $data['numtel'], $data['email']);
        try {


            $resp = static::$documentManager->merge($resp);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $resp;
    }

    public function updateResponsable($resp, $data)
    {

        // TODO: Implement updateResponsable() method.
        $resp->setNom($data['nom']);
        $resp->setPrenom($data['prenom']);
        $resp->setNumTel($data['numtel']);
        $resp->setEmail($data['email']);

        $resp = self::$documentManager->merge($resp);
        self::$documentManager->flush();


        return $resp;
    }
}