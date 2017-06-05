<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 09:27
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\ImageAcceuilIdao;
use GuideTouristiqueBundle\Document\ImagesAcceuil;

class ImageAcceuilImpDao extends GenericImplDao implements ImageAcceuilIdao
{

    public function addImageAcceuil($data)
    {
        // TODO: Implement addImageAcceuil() method.
        $image = new ImagesAcceuil($data['slide'], $data['nom'], $data['nom'], $data['type'], date('Y-m-d H:i:s'), $data['taille'], $data['media']);
        try {


            $image = self::$documentManager->merge($image);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $image;
    }

    public function updateImageAcceuil($image, $data)
    {
        // TODO: Implement updateImageAcceuil() method.
        try {
            $image->setNom($data['nom']);
            $image->setSlide($data['slide']);
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

    public function findImageBYMediaAcceuil($media)
    {
        // TODO: Implement findImageBYMediaAcceuil() method.
        try {
            return self::$documentManager->getRepository('GuideTouristiqueBundle:ImagesAcceuil')
                ->findOneBy(['media' => $media]);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findAllSlideShowImage()
    {
        // TODO: Implement findAllSlideShowImage() method.
        try {
            return self::$documentManager->getRepository('GuideTouristiqueBundle:ImagesAcceuil')
                ->findBy(['slide' => true]);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}