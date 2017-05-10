<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:41
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackVisiteVirtuelleIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\CpackVisiteVirtuelle;


class CpackVisiteVirtuelleImpDao extends GenericImplDao implements CpackVisiteVirtuelleIdao
{

    public function addCpackVisiteVirtuelle($data)
    {
        // TODO: Implement addCpackVisiteVirtuelle() method.
        $cpackVisiteVirtuelle = new CpackVisiteVirtuelle($data['offre'], $data['visitevirtuelle'], $data['categorie']);

        try {


            $cpackVisiteVirtuelle = self::$documentManager->merge($cpackVisiteVirtuelle);

            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $cpackVisiteVirtuelle;
    }

    public function updateCpackVisiteVirtuelle($cpackVisiteVirtuelle, $data)
    {
        // TODO: Implement updateCpackVisiteVirtuelle() method.


        try {


            $cpackVisiteVirtuelle->setOffre($data['offre']);
            $cpackVisiteVirtuelle->setVisiteVirtuelle($data['visitevirtuelle']);
            $cpackVisiteVirtuelle->setCategorie($data['categorie']);
            self::$documentManager->merge($cpackVisiteVirtuelle);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}