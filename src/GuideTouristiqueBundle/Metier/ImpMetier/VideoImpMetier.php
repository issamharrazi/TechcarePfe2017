<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:28
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\VideoIMetier;

class VideoImpMetier implements VideoIMetier
{
    const CLASSNAMEVIDEO = 'Video';
    protected static $videoImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\VideoIdao $videoImpdao)
    {


        self::$videoImpdao = $videoImpdao;

    }


    public function addVideo($data)
    {
        // TODO: Implement addVideo() method.
        return static::$videoImpdao->addVideo($data);
    }

    public function updateVideo($data)
    {
        // TODO: Implement updateVideo() method.
        $video = static::$videoImpdao->findById(self::CLASSNAMEVIDEO, $data['id']);
        static::$videoImpdao->updateVideo($video, $data);
    }

    public function deleteVideo($id)
    {
        // TODO: Implement deleteVideo() method.
        $video = static::$videoImpdao->findById(self::CLASSNAMEVIDEO, $id);
        static::$videoImpdao->delete($video);
    }

    public function getAllVideos()
    {
        // TODO: Implement getAllVideos() method.
        $videos = static::$videoImpdao->findAll(self::CLASSNAMEVIDEO);


        return $videos;
    }

    public function getVideo($id)
    {
        // TODO: Implement getVideo() method.
        $video = static::$videoImpdao->findById(self::CLASSNAMEVIDEO, $id);

        return $video;
    }
}