<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 00:09
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface VideoIdao extends GenericIDao
{

    public function addVideo($video);

    public function updateVideo($oldVideo, $newVideo);

}