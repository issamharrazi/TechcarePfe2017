<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 19:45
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackImageIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\CpackImage;

class CpackImageImpDao extends GenericImplDao implements CpackImageIdao
{

    public function addCpackImage($data)
    {
        // TODO: Implement addCpackImage() method.


        $cpackImage = new CpackImage($data['offre'], $data['categorie']);


        for ($i = 0; $i < count($data['images']); $i++) {
            $cpackImage->addImage($data['images'][$i]);
        }


        self::$documentManager->persist($cpackImage);

        self::$documentManager->flush();


        return $cpackImage;
    }

    public function updateCpackImage($document, $data)
    {
        // TODO: Implement updateCpackImage() method.
    }
}