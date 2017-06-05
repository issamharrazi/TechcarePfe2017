<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 09:35
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface ImageAcceuilIMetier
{
    public function addImageAcceuil($requestContent);

    public function updateImageAcceuil($requestContent);

    public function deleteImageAcceuil($id);

    public function getAllImagesAcceuil();

    public function getAllImagesSlideShow();

    public function getImageAcceuil($id);

    public function findExistImageAcceuil($requestContent);

}