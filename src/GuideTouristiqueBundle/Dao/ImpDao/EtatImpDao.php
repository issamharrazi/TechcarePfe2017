<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 15:43
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\EtatIdao;
use GuideTouristiqueBundle\Document\Etat;

class EtatImpDao extends GenericImplDao implements EtatIdao
{


    public function addEtat($data)
    {
        // TODO: Implement add() method.

        $etat = new Etat($data['nom'], $data['num']);
        try {


            $etat = self::$documentManager->merge($etat);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $etat;
    }


    public function updateEtat($document, $data)
    {
        // TODO: Implement update() method.

        try {


            $document->setNom($data['nom']);
            $document->setNum($data['num']);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findEtatByNum($class, $num)
    {
        // TODO: Implement findById() method.


        $etat = self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
            ->findBy(array('num' => (int)$num));


        return $etat;


    }


}