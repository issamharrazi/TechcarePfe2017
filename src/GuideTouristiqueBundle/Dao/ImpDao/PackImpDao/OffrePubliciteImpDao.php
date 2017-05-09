<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 23:36
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffrePubliciteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffrePublicite;


class OffrePubliciteImpDao extends GenericImplDao implements OffrePubliciteIdao
{

    public function addOffrePublicite($data)
    {
        // TODO: Implement addOffrePublicite() method.
        $offrePub = new OffrePublicite($data['nom'], $data['description'], $data['prix'], $data['devise'], $data['duree'], $data['image'], $data['etat'], $data['remise'], $data['nbre_images']);

        try {


            $offrePub = self::$documentManager->merge($offrePub);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offrePub;

    }

    public function updateOffrePublicite($offrePub, $data)
    {
        // TODO: Implement updateOffrePublicite() method.

        $offrePub->setNom($data['nom']);
        $offrePub->setDescription($data['description']);
        $offrePub->setPrix($data['prix']);


        $offrePub->setDuree($data['duree']);
        $offrePub->setDevise($data['devise']);
        $offrePub->setNbreImages($data['nbreImages']);
        $offrePub->setImage($data['image']);
        $offrePub->setEtat($data['etat']);
        $offrePub->setRemise($data['remise']);

        $offrePub = self::$documentManager->merge($offrePub);
        self::$documentManager->flush();
        return $offrePub;
    }
}