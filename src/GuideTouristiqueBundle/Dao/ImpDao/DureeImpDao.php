<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 22:30
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\DureeIdao;
use GuideTouristiqueBundle\Document\Duree;


class DureeImpDao extends GenericImplDao implements DureeIdao
{

    public function addDuree($data)
    {
        // TODO: Implement addDuree() method.
        $duree = new Duree($data['jour'], $data['mois'], $data['annee']);
        try {


            $duree = static::$documentManager->merge($duree);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $duree;
    }

    public function updateDuree($duree, $data)
    {
        // TODO: Implement updateDuree() method.

        $duree->setJour($data['jour']);
        $duree->setMois($data['mois']);
        $duree->setAnnee($data['annee']);
        $duree = self::$documentManager->merge($duree);
        self::$documentManager->flush();


        return $duree;
    }
}