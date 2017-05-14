<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 12:58
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\TacheImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\TacheIDao\TacheIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Tache;


class TacheImpDao extends GenericImplDao implements TacheIdao
{

    public function addTache($data)
    {
        // TODO: Implement addTache() method.
        $tache = new Tache($data['nom'], $data['description'], $data['user'], $data['etat']);
        try {


            $tache = static::$documentManager->merge($tache);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $tache;
    }

    public function updateTache($tache, $data)
    {

        // TODO: Implement updateTache() method.
        $tache->setNom($data['nom']);
        $tache->setDescription($data['description']);
        $tache->setUser($data['user']);
        $tache->setEtat($data['etat']);

        $tache = self::$documentManager->merge($tache);
        self::$documentManager->flush();


        return $tache;
    }
}