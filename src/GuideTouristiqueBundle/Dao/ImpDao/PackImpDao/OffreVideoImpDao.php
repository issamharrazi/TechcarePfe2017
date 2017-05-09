<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 06/05/2017
 * Time: 13:48
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreVideoIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffreVideo;

class OffreVideoImpDao extends GenericImplDao implements OffreVideoIdao
{

    public function addOffreVideo($data)
    {
        // TODO: Implement addOffreVideo() method.
        $offrevid = new OffreVideo($data['nom'], $data['description'], $data['prix'], $data['devise'], $data['duree'], $data['image'], $data['etat'], $data['remise'], $data['nbre_videos']);

        try {


            $offrevid = self::$documentManager->merge($offrevid);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offrevid;
    }

    public function updateOffreVideo($offreVid, $data)
    {
        // TODO: Implement updateOffreVideo() method.

        $offreVid->setNom($data['nom']);
        $offreVid->setDescription($data['description']);
        $offreVid->setPrix($data['prix']);


        $offreVid->setDuree($data['duree']);
        $offreVid->setDevise($data['devise']);
        $offreVid->setNbreVideos($data['nbreVideos']);
        $offreVid->setImage($data['image']);
        $offreVid->setEtat($data['etat']);
        $offreVid->setRemise($data['remise']);

        $offreVid = self::$documentManager->merge($offreVid);
        self::$documentManager->flush();
        return $offreVid;
    }
}