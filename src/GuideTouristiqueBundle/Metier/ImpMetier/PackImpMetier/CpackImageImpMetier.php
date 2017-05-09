<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 18:52
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackImageIMetier;

class CpackImageImpMetier implements CpackImageIMetier
{
    const CLASSNAMECPACKIMAGE = 'CpackImage';
    protected static $metierImpOffre;
    protected static $metierImpCategorie;
    protected static $metierImpImage;
    protected static $impdaoCpackImage;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackImageIdao $impdaoCpackImage, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreImageIMetier $metierImpOffre, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier $metierImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $metierImpImage)
    {


        self::$impdaoCpackImage = $impdaoCpackImage;
        self::$metierImpOffre = $metierImpOffre;
        self::$metierImpCategorie = $metierImpCategorie;

        self::$metierImpImage = $metierImpImage;

    }


    public function addCpackImage($data)
    {
        // TODO: Implement addCpackImage() method.


        $data['offre'] = self::$metierImpOffre->getOffreImage($data['offre']['id']);

        $data['categorie'] = self::$metierImpCategorie->getCategorieByNum(2);


        for ($i = 0; $i < count($data['images']); $i++) {

            $data['images'][$i] = self::$metierImpImage->addImage($data['images'][$i]);
        }


        $cpackImage = self::$impdaoCpackImage->addCpackImage($data);

        return $cpackImage;

    }

    public function updateCpackImage($requestContent)
    {
        // TODO: Implement updateCpackImage() method.
    }

    public function deleteCpackImage($id)
    {
        // TODO: Implement deleteCpackIage() method.
    }

    public function getAllCpackImage()
    {
        // TODO: Implement getAllCpackImage() method.
    }

    public function getCpackImage($id)
    {
        // TODO: Implement getCpackImage() method.
    }
}