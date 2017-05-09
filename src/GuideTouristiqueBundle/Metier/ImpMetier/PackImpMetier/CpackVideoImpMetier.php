<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 20:07
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackVideoIMetier;

class CpackVideoImpMetier implements CpackVideoIMetier
{

    const CLASSNAMECPACKVIDEO = 'CpackVideo';
    protected static $metierImpOffre;
    protected static $metierImpCategorie;
    protected static $metierImpVideo;
    protected static $impdaoCpackVideo;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackVideoIdao $impdaoCpackVideo, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreVideoIMetier $metierImpOffre, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier $metierImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\VideoIMetier $metierImpVideo)
    {


        self::$impdaoCpackVideo = $impdaoCpackVideo;
        self::$metierImpOffre = $metierImpOffre;
        self::$metierImpCategorie = $metierImpCategorie;

        self::$metierImpVideo = $metierImpVideo;

    }


    public function addCpackVideo($data)
    {
        // TODO: Implement addCpackVideo() method.


        $data['offre'] = self::$metierImpOffre->getOffreVideo($data['offre']['id']);

        $data['categorie'] = self::$metierImpCategorie->getCategorieByNum(2);


        for ($i = 0; $i < count($data['videos']); $i++) {

            $data['videos'][$i] = self::$metierImpVideo->addVideo($data['videos'][$i]);
        }


        $cpackVideo = self::$impdaoCpackVideo->addCpackVideo($data);
        return $cpackVideo;

    }

    public function updateCpackVideo($requestContent)
    {
        // TODO: Implement updateCpackVideo() method.
    }

    public function deleteCpackVideo($id)
    {
        // TODO: Implement deleteCpackVideo() method.
    }

    public function getAllCpackVideo()
    {
        // TODO: Implement getAllCpackVideo() method.
    }

    public function getCpackVideo($id)
    {
        // TODO: Implement getCpackVideo() method.
    }
}