<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 12:16
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


class GenericImplDao implements GenericIDao
{
    protected static $documentManager;

    /**
     * GenericImplDao constructor.
     */
    public function __construct(ObjectManager $om)
    {

        self::$documentManager = $om;
    }


    public function delete($document)
    {
        // TODO: Implement delete() method.
        try {


            self::$documentManager->remove($document);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function findAll($class)
    {
        // TODO: Implement findAll() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findAll();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }


    public function findAllActivated($class)
    {
        // TODO: Implement findById() method.


        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findBy(array('etat.num' => 1));


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }


    }


    public function findAllByLang($class, $lang)
    {
        // TODO: Implement findAllByLang() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findBy(array('langue.nom' => $lang));

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findAllActivatedByLang($class, $lang)
    {
        // TODO: Implement findAllActivatedByLang() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findBy(array('langue.nom' => $lang, 'etat.num' => 1));

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function findById($class, $id)
    {
        // TODO: Implement findById() method.


        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->find($id);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }


    }

    public function FindByMail($mail, $class)
    {
        // TODO: Implement FindClientByMail() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findOneBy(['email' => $mail, 'etat.num' => 1]);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}