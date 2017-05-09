<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:19
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\VideoIdao;
use GuideTouristiqueBundle\Document\Video;

class VideoImpDao extends GenericImplDao implements VideoIdao
{

    public function addVideo($data)
    {
        // TODO: Implement addVideo() method.
        $video = new Video($data['nom'], $data['type'], date('Y-m-d H:i:s'), $data['taille'], $data['media']);
        try {


            $video = self::$documentManager->merge($video);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $video;
    }

    public function updateVideo($video, $data)
    {
        // TODO: Implement updateVideo() method.

        try {

            $video->setNom($data['nom']);
            $video->setType($data['type']);
            $video->setUploadDate(date('Y-m-d H:i:s'));
            $video->setTaille($data['taille']);
            $video->setMedia($data['media']);


            $video = self::$documentManager->merge($video);

            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $video;
    }

}