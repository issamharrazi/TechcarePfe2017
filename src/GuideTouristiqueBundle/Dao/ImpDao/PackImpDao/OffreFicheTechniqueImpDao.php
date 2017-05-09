<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 01:49
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreFicheTechniqueIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\OffreFicheTechnique;

class OffreFicheTechniqueImpDao extends GenericImplDao implements OffreFicheTechniqueIdao
{

    public function addOffreFicheTechnique($data)
    {

        // TODO: Implement addOffreFicheTechnique() method.


        $offreFT = new OffreFicheTechnique($data['nom'], $data['description'], $data['prix'], $data['devise'], $data['duree'], $data['image'], $data['etat'], $data['remise']);

        try {


            $offreFT = self::$documentManager->merge($offreFT);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $offreFT;
    }

    public function updateOffreFicheTechnique($offreFT, $data)
    {
        // TODO: Implement updateOffreFicheTechnique() method.


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