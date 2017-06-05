<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 09:26
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface ImageAcceuilIdao extends GenericIDao
{
    public function addImageAcceuil($image);

    public function updateImageAcceuil($oldImage, $newImage);

    public function findImageBYMediaAcceuil($media);

    public function findAllSlideShowImage();

}