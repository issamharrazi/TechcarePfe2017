<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 10:18
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreMediaIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffreMedia;

class OffreMediaImpDao extends GenericImplDao implements OffreMediaIdao
{

    public function addOffreMedia($data)
    {
        // TODO: Implement addOffreMedia() method.

        $offreMedia = new OffreMedia($data['nbre_media'], $data['nom'], $data['description'], $data['prix'], $data['duree']);

        try {


            $offreMedia = self::$documentManager->merge($offreMedia);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offreMedia;
    }

    public function updateOffreMedia($offreMedia, $data)
    {
        // TODO: Implement updateOffreMedia() method.


        $offreMedia->setNom($data['nom']);
        $offreMedia->setDescription($data['description']);
        $offreMedia->setPrix($data['prix']);
        $offreMedia->setDuree($data['duree']);
        $offreMedia->setNbreMedia($data['nbreMedia']);
        self::$documentManager->merge($offreMedia);
        self::$documentManager->flush();


    }
}