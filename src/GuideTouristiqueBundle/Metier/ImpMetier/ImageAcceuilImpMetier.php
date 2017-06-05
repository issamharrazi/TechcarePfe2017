<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 09:36
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\ImageAcceuilIMetier;

class ImageAcceuilImpMetier implements ImageAcceuilIMetier
{
    const CLASSNAMEIMAGE = 'ImagesAcceuil';
    protected static $imageImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\ImageAcceuilIdao $imageImpdao)
    {


        self::$imageImpdao = $imageImpdao;


    }

    public function addImageAcceuil($data)
    {
        // TODO: Implement addImage() method.
        return static::$imageImpdao->addImageAcceuil($data);
    }

    public function updateImageAcceuil($data)
    {
        // TODO: Implement updateImage() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $data['id']);

        return static::$imageImpdao->updateImageAcceuil($image, $data);
    }

    public function deleteImageAcceuil($id)
    {
        // TODO: Implement deleteImage() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $id);
        static::$imageImpdao->delete($image);


    }

    public function getAllImagesAcceuil()
    {
        // TODO: Implement getAllImages() method.
        return static::$imageImpdao->findAll(self::CLASSNAMEIMAGE);
    }


    public function getImageAcceuil($id)
    {
        // TODO: Implement getImageAcceuil() method.
        $image = static::$imageImpdao->findById(self::CLASSNAMEIMAGE, $id);

        return $image;
    }

    public function findExistImageAcceuil($media)
    {
        // TODO: Implement findExistImageAcceuil() method.
        $image = static::$imageImpdao->findImageBYMediaAcceuil($media);

        return $image;
    }

    public function getAllImagesSlideShow()
    {
        // TODO: Implement getAllImagesSlideShow() method.
        return static::$imageImpdao->findAllSlideShowImage();

    }
}