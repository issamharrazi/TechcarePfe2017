<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 01:12
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\ImageIMetier;

class ImageImpMetier implements ImageIMetier
{

    const CLASSNAMEIMAGE = 'Image';
    protected static $imageImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\ImageIdao $imageImpdao)
    {


        self::$imageImpdao = $imageImpdao;


    }


    public function addImage($data)
    {
        // TODO: Implement addImage() method.


        return static::$imageImpdao->addImage($data);
    }

    public function updateImage($data)
    {
        // TODO: Implement updateImage() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $data['id']);

        return static::$imageImpdao->updateImage($image, $data);
    }

    public function deleteImage($id)
    {
        // TODO: Implement deleteImage() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $id);
        static::$imageImpdao->delete($image);

    }

    public function getAllImages()
    {
        // TODO: Implement getAllImages() method.
        return static::$imageImpdao->findAll(self::CLASSNAMEIMAGE);

    }

    public function getImage($id)
    {
        // TODO: Implement getImage() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $id);

        return $image;
    }


    public function findExistImage($media)
    {
        // TODO: Implement findExistImage() method.
        $image = static::$imageImpdao->findImageBYMedia($media);

        return $image;
    }
}