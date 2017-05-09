<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 12:14
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\CategorieIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Categorie;


class CategorieImpDao extends GenericImplDao implements CategorieIdao
{

    public function addCategorie($data)
    {
        // TODO: Implement add() method.


        $categorie = new Categorie($data['nom'], $data['description'], $data['image'], $data['num'], $data['etat']);
        try {


            $categorie = static::$documentManager->merge($categorie);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $categorie;

    }

    public function findByNum($class, $num)
    {
        // TODO: Implement findById() method.


        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findOneBy(array('num' => intval($num)));


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }


    }


    public function updateCategorie($categorie, $data)
    {
        $categorie->setNom($data['nom']);
        $categorie->setDescription($data['description']);
        $categorie->setImage($data['image']);
        $categorie->setNum($data['num']);
        $categorie->setEtat($data['etat']);

        $categorie = self::$documentManager->merge($categorie);
        self::$documentManager->flush();


        return $categorie;
        // TODO: Implement updateCategorie() method.
    }
}