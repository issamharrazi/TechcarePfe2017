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
use GuideTouristiqueBundle\Document\LangueTraduction;

class LangueImpDao extends GenericImplDao implements LangueIdao
{


    public function addLangue($data)
    {

        // TODO: Implement addLangue() method.

        try {

            // add langue
            if (isset($data['ownlanguetraductionspreced']) && isset($data['precedentlanguetraductions']))
                $default = false;
            else
                $default = true;

            $langue = new Langue($data['etat'], $default);
            $langue = static::$documentManager->merge($langue);
            self::$documentManager->flush();


            //  add own lang tradution
            $langueTr = new LangueTraduction(ucfirst($data['ownlanguetraduction']['nom']), $langue, $langue);
            static::$documentManager->merge($langueTr);
            self::$documentManager->flush();

            $langtr = [];
            //add own lang tradutions
            if (isset($data['ownlanguetraductionspreced'])) {
                foreach ($data['ownlanguetraductionspreced'] as $langueTr) {

                    $langueref = self::$documentManager->getRepository('GuideTouristiqueBundle:Langue')
                        ->find($langueTr['langueref']['id']);

                    $langueTr = new LangueTraduction(ucfirst($langueTr['newnom']), $langue, $langueref);//$langueTr['langueref'] sera lang de lang default
                    $langtr [] = static::$documentManager->merge($langueTr);
                    self::$documentManager->flush();

                }
            }
            $langtr2 = [];
            //add precedent lang tradutions
            if (isset($data['precedentlanguetraductions'])) {
                foreach ($data['precedentlanguetraductions'] as $langueTr) {


                    $langueref = self::$documentManager->getRepository('GuideTouristiqueBundle:Langue')
                        ->find($langueTr['langue']['id']);

                    $langueTr = new LangueTraduction(ucfirst($langueTr['newtrnom']), $langueref, $langue);//$langue sera lang de lang default
                    $langtr2[] = static::$documentManager->merge($langueTr);
                    self::$documentManager->flush();

                }
            }


//var_dump($langtr);



        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return 'language added';
    }

    public function updateLangueTraduction($document, $data)
    {
        // TODO: Implement updateLangue() method.

        try {


            $document->setNom($data['nom']);

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


    public function selectActivatedDefaultLangues()
    {
        // TODO: Implement selectActivatedDefaultLangues() method.
        $langue = self::$documentManager->getRepository('GuideTouristiqueBundle:Langue')
            ->findOneBy(array('default' => true, 'etat.num' => 1));

        $languetr = self::$documentManager->getRepository('GuideTouristiqueBundle:LangueTraduction')
            ->findBy(array('langueref.id' => $langue->getId()));

        //  var_dump($languetr);

        return $languetr;
    }

    public function selectTraductionsLangue($id)
    {

        $languetr = self::$documentManager->getRepository('GuideTouristiqueBundle:LangueTraduction')
            ->findBy(array('langue.id' => $id));


        return $languetr;
    }

    public function updateLangue($document, $data)
    {
        // TODO: Implement updateLangue() method.
        try {


            $document->setDefault($data['default']);

            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}