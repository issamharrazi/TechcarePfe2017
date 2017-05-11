<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 10:14
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\LangueIdao;
use GuideTouristiqueBundle\Document\Langue;

class LangueImpDao extends GenericImplDao implements LangueIdao
{

    public function addLangue($data)
    {
        // TODO: Implement addLangue() method.
        $langue = new Langue($data['nom'], $data['etat']);
        try {


            $langue = self::$documentManager->merge($langue);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $langue;
    }

    public function updateLangue($document, $data)
    {
        // TODO: Implement updateLangue() method.

        try {


            $document->setNom($data['nom']);
            $document->setEtat($data['etat']);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findLangueByName($class, $nom)
    {
        // TODO: Implement findLangueByName() method.


        $langue = self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
            ->findBy(array('nom' => $nom));


        return $langue;

    }
}