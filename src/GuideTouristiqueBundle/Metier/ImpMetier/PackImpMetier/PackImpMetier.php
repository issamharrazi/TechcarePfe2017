<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 12/04/2017
 * Time: 10:42
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\PackIMetier;

class PackImpMetier implements PackIMetier
{

    const CLASSNAMEPACK = 'Pack';
    protected static $impdaoPack;
    protected static $metierImpCpackFicheTechnique;
    protected static $metierImpCpackImage;
    protected static $metierImpCpackVideo;
    protected static $metierImpCpackPublicite;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\PackIdao $impdaopack, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackFicheTechniqueIMetier $metierImpCpackFicheTechnique, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackImageIMetier $metierImpCpackImage, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackVideoIMetier $metierImpCpackVideo, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackPubliciteIMetier $metierImpCpackPublicite)
    {


        self::$metierImpCpackFicheTechnique = $metierImpCpackFicheTechnique;
        self::$metierImpCpackPublicite = $metierImpCpackPublicite;
        self::$metierImpCpackImage = $metierImpCpackImage;
        self::$metierImpCpackVideo = $metierImpCpackVideo;
        self::$impdaoPack = $impdaopack;

    }


    public function addPACK($data)
    {
        // TODO: Implement addPACK() method.

        $dataSave = [];
        foreach ($data as $packData) {
            if ($packData['num'] == 1) {
                $dataSave['cpackFicheTechnique'] = self::$metierImpCpackFicheTechnique->addCpackFicheTechnique($packData);

            } elseif ($packData['num'] == 2) {
                $dataSave['cpackImage'] = self::$metierImpCpackImage->addCpackImage($packData);

            } elseif ($packData['num'] == 3) {
                $dataSave['cpackVideo'] = self::$metierImpCpackVideo->addCpackVideo($packData);
            } elseif ($packData['num'] == 4) {
                $dataSave['cpackPublicite'] = self::$metierImpCpackPublicite->addCpackPublicite($packData);
            }


        }


        $pack = self::$impdaoPack->addPack($dataSave);

        return $pack;

    }

    public function updatePACK($requestContent)
    {
        // TODO: Implement updatePACK() method.
    }

    public function deletePACK($id)
    {
        // TODO: Implement deletePACK() method.
    }

    public function getAllPACK()
    {
        // TODO: Implement getAllPACK() method.
    }

    public function getPACK($id)
    {
        // TODO: Implement getPACK() method.
    }
}