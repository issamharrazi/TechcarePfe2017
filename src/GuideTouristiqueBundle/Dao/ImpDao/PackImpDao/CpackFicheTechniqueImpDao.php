<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 10:17
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackFicheTechniqueIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\CpackFicheTechnique;


class CpackFicheTechniqueImpDao extends GenericImplDao implements CpackFicheTechniqueIdao
{

    public function addCpackFicheTechnique($data)
    {
        // TODO: Implement add() method.


        $cpackFicheTechnique = new CpackFicheTechnique($data['offre'], $data['ficheTechnique'], $data['categorie']);

        try {



            $cpackFicheTechnique = self::$documentManager->merge($cpackFicheTechnique);

            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $cpackFicheTechnique;
    }


    public function updateCpackFicheTechnique($cpackFicheTechnique, $data)
    {
        // TODO: Implement update() method.

        try {


            $cpackFicheTechnique->setOffre($data['offre']);
            $cpackFicheTechnique->setFicheTechnique($data['ficheTechnique']);
            $cpackFicheTechnique->setCategorie($data['categorie']);
            self::$documentManager->merge($cpackFicheTechnique);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}