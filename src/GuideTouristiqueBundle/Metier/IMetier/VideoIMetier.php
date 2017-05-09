<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:26
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface VideoIMetier
{

    public function addVideo($requestContent);

    public function updateVideo($requestContent);

    public function deleteVideo($id);

    public function getAllVideos();

    public function getVideo($id);
}