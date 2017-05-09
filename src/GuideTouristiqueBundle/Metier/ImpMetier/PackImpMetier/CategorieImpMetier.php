<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 16:19
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier;

class CategorieImpMetier implements CategorieIMetier
{

    const CLASSNAMECATEGORIE = 'Categorie';
    protected static $idaoImpCategorie;
    protected static $metierImpImage;
    protected static $etatImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CategorieIdao $idaoImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $serviceImageImpMetier, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$idaoImpCategorie = $idaoImpCategorie;

        self::$metierImpImage = $serviceImageImpMetier;

        self::$etatImpMetier = $etatImpMetier;


    }

    public function addCategorie($data)
    {


        // TODO: Implement addCategorie() method.


        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['image'] = self::$metierImpImage->addImage($data['image']);


        $categorie = self::$idaoImpCategorie->addCategorie($data);

        return $categorie;


    }

    public function updateCategorie($data)
    {
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        // TODO: Implement updateCategorie() method.
        $data['image'] = self::$metierImpImage->updateImage($data['image']);

        $categorie = self::$idaoImpCategorie->findById(self::CLASSNAMECATEGORIE, $data['id']);
        return self::$idaoImpCategorie->updateCategorie($categorie, $data);
    }

    public function deleteCategorie($id)
    {
        // TODO: Implement deleteCategorie() method.
        $categorie = self::$idaoImpCategorie->findById(self::CLASSNAMECATEGORIE, $id);
        self::$metierImpImage->deleteImage($categorie->getImage()->getId());


        self::$idaoImpCategorie->delete($categorie);

    }

    public function getAllCategorie()
    {
        // TODO: Implement getAllCategorie() method.

        $categories = self::$idaoImpCategorie->findAll(self::CLASSNAMECATEGORIE);


        return $categories;
    }

    public function getCategorie($id)
    {
        // TODO: Implement getCategorie() method.
        $categorie = self::$idaoImpCategorie->findById(self::CLASSNAMECATEGORIE, $id);


        return $categorie;
    }


    public function getCategorieByNum($num)
    {
        // TODO: Implement getCategorieByNum() method.
        $categorie = self::$idaoImpCategorie->findByNum(self::CLASSNAMECATEGORIE, $num);

        return $categorie;
    }

    public function findAllActivatedCategories()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $categories = static::$idaoImpCategorie->findAllActivated(self::CLASSNAMECATEGORIE);

        return $categories;
    }
}