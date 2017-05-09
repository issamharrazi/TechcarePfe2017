<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 13:47
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreImageIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffreImage;


class OffreImageImpDao extends GenericImplDao implements OffreImageIdao
{

    public function addOffreImage($data)
    {
        // TODO: Implement addOffreImage() method.

        $offreImg = new OffreImage($data['nom'], $data['description'], $data['prix'], $data['devise'], $data['duree'], $data['image'], $data['etat'], $data['remise'], $data['nbre_images']);

        try {


            $offreImg = self::$documentManager->merge($offreImg);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offreImg;


    }

    public function updateOffreImage($offreImg, $data)
    {
        // TODO: Implement updateOffreImage() method.

        $offreImg->setNom($data['nom']);
        $offreImg->setDescription($data['description']);
        $offreImg->setPrix($data['prix']);


        $offreImg->setDuree($data['duree']);
        $offreImg->setDevise($data['devise']);
        $offreImg->setNbreImages($data['nbreImages']);
        $offreImg->setImage($data['image']);
        $offreImg->setEtat($data['etat']);
        $offreImg->setRemise($data['remise']);

        $offreImg = self::$documentManager->merge($offreImg);
        self::$documentManager->flush();
        return $offreImg;

    }
}