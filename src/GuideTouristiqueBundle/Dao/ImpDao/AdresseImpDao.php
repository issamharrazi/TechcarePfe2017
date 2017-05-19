<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 10:39
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\AdresseIdao;
use GuideTouristiqueBundle\Document\Adresse;

class AdresseImpDao extends GenericImplDao implements AdresseIdao
{

    public function addAdresse($data)
    {
        // TODO: Implement addAdresse() method.
        $adresse = new Adresse($data['nomrue'], $data['numrue'], $data['ville'], $data['pays']);
        try {


            $adresse = static::$documentManager->merge($adresse);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $adresse;
    }

    public function updateAdresse($adresse, $data)
    {

        // TODO: Implement updateAdresse() method.
        $adresse->setNomrue($data['nomrue']);
        $adresse->setNumrue($data['numrue']);
        $adresse->setVille($data['ville']);
        $adresse->setPays($data['pays']);
        $adresse = self::$documentManager->merge($adresse);
        self::$documentManager->flush();


        return $adresse;
    }
}