<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:58
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackVideoIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\CpackVideo;

class CpackVideoImpDao extends GenericImplDao implements CpackVideoIdao
{

    public function addCpackVideo($data)
    {
        // TODO: Implement addCpackVideo() method.

        try {


            $cpackVideo = new CpackVideo($data['offre'], $data['categorie']);


            for ($i = 0; $i < count($data['videos']); $i++) {
                $cpackVideo->addVideo($data['videos'][$i]);
            }


            self::$documentManager->persist($cpackVideo);

            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $cpackVideo;

    }

    public function updateCpackVideo($document, $data)
    {
        // TODO: Implement updateCpackVideo() method.
    }
}