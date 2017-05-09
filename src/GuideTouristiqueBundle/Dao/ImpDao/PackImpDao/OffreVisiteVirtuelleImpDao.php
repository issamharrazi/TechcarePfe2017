<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 02:00
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreVisiteVirtuelleIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffreVisiteVirtuelle;

class OffreVisiteVirtuelleImpDao extends GenericImplDao implements OffreVisiteVirtuelleIdao
{

    public function addOffreVisiteVirtuelle($data)
    {
        // TODO: Implement addOffreVisiteVirtuelle() method.

        $offreFT = new OffreVisiteVirtuelle($data['nom'], $data['description'], $data['prix'], $data['devise'], $data['duree'], $data['image'], $data['etat'], $data['remise']);

        try {


            $offreFT = self::$documentManager->merge($offreFT);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offreFT;
    }

    public function updateOffreVisiteVirtuelle($offreFT, $data)
    {
        // TODO: Implement updateOffreVisiteVirtuelle() method.
        $offreFT->setNom($data['nom']);
        $offreFT->setDescription($data['description']);
        $offreFT->setPrix($data['prix']);


        $offreFT->setDuree($data['duree']);
        $offreFT->setDevise($data['devise']);
        $offreFT->setImage($data['image']);
        $offreFT->setEtat($data['etat']);
        $offreFT->setRemise($data['remise']);

        $offreFT = self::$documentManager->merge($offreFT);
        self::$documentManager->flush();
        return $offreFT;
    }
}