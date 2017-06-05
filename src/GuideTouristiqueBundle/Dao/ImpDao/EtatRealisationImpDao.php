<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/06/2017
 * Time: 00:00
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\EtatRealisationIdao;
use GuideTouristiqueBundle\Document\EtatRealisation;


class EtatRealisationImpDao extends GenericImplDao implements EtatRealisationIdao
{

    public function addEtatRealisation($data)
    {
        // TODO: Implement addEtatRealisation() method.
        $etat = new EtatRealisation($data['nom'], $data['num']);
        try {


            $etat = self::$documentManager->merge($etat);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $etat;
    }

    public function updateEtatRealisation($document, $data)
    {
        // TODO: Implement updateEtatRealisation() method.
        try {


            $document->setNom($data['nom']);
            $document->setNum($data['num']);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findEtatRealisationByNum($class, $num)
    {
        // TODO: Implement findEtatRealisationByNum() method.
        $etat = self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
            ->findBy(array('num' => (int)$num));


        return $etat;
    }
}