<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 00:17
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\FicheTechniqueIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\FicheTechnique;

class FicheTechniqueImpDao extends GenericImplDao implements FicheTechniqueIdao
{
    public function addFicheTechnique($data)
    {
        // TODO: Implement add() method.


        $ficheTechnique = new FicheTechnique($data['description']);
        try {


            $ficheTechnique = self::$documentManager->merge($ficheTechnique);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $ficheTechnique;
    }

    public function updateFicheTechnique($ficheTechnique, $data)
    {
        // TODO: Implement update() method.

        try {
            $ficheTechnique->setDescription($data['description']);
            self::$documentManager->merge($ficheTechnique);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}