<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:12
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;

class OffreImpDao extends GenericImplDao implements OffreIdao
{

    public function addOffre($data)
    {
        // TODO: Implement add() method.

        //$offre = new Offre($data['nom'],$data['description'],$data['prix'],$data['duree']);

        try {


            // $offre = self::$documentManager->merge($offre);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offre;

    }


    public function updateOffre($offre, $data)
    {
        // TODO: Implement update() method.

        try {


            $offre->setNom($data['nom']);
            $offre->setDescription($data['description']);
            $offre->setPrix($data['prix']);
            $offre->setDuree($data['duree']);
            self::$documentManager->merge($offre);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}