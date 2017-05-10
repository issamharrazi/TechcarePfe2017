<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 14:49
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\VisiteVirtuelleIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\VisiteVirtuelle;


class VisiteVirtuelleImpDao extends GenericImplDao implements VisiteVirtuelleIdao
{

    public function addVisiteVirtuelle($data)
    {
        // TODO: Implement addVisiteVirtuelle() method.
        $visiteVirtuelle = new VisiteVirtuelle($data['nom'], $data['type'], date('Y-m-d H:i:s'), $data['taille'], $data['media']);
        try {


            $visiteVirtuelle = self::$documentManager->merge($visiteVirtuelle);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $visiteVirtuelle;
    }

    public function updateVisiteVirtuelle($visiteVirtuelle, $data)
    {
        // TODO: Implement updateVisiteVirtuelle() method.

        try {

            $visiteVirtuelle->setNom($data['nom']);
            $visiteVirtuelle->setType($data['type']);
            $visiteVirtuelle->setUploadDate(date('Y-m-d H:i:s'));
            $visiteVirtuelle->setTaille($data['taille']);
            $visiteVirtuelle->setMedia($data['media']);


            $visiteVirtuelle = self::$documentManager->merge($visiteVirtuelle);

            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $visiteVirtuelle;

    }
}