<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 00:13
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\ImageIdao;
use GuideTouristiqueBundle\Document\Image;

class ImageImpDao extends GenericImplDao implements ImageIdao
{

    public function addImage($data)
    {
        // TODO: Implement addImage() method.


        $image = new Image($data['nom'], $data['nom'], $data['type'], date('Y-m-d H:i:s'), $data['taille'], $data['media']);
        try {


            $image = self::$documentManager->merge($image);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $image;
    }

    public function updateImage($image, $data)
    {
        // TODO: Implement updateImage() method.

        try {
            $image->setNom($data['nom']);
            $image->setAlt($data['nom']);
            $image->setType($data['type']);
            $image->setUploadDate(date('Y-m-d H:i:s'));
            $image->setTaille($data['taille']);
            $image->setMedia($data['media']);


            $image = self::$documentManager->merge($image);

            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $image;
    }


}