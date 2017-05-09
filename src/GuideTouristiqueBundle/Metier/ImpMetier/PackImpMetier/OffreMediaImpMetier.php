<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 10:32
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreMediaIMetier;


class OffreMediaImpMetier implements OffreMediaIMetier
{

    const CLASSNAMEOFFREMEDIA = 'OffreMedia';
    protected static $daoImpOffreMedia;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreMediaIdao $daoImpOffreMedia)
    {


        self::$daoImpOffreMedia = $daoImpOffreMedia;

    }


    public function addOffreMedia($requestContent)
    {
        // TODO: Implement addOffreMedia() method.

        $data = $requestContent;


        //  $data = json_decode($requestContent, true);


        $offreMedia = self::$daoImpOffreMedia->addOffreMedia($data);
        return $offreMedia;
    }

    public function updateOffreMedia($requestContent)
    {
        // TODO: Implement updateOffreMedia() method.
        $data = $requestContent;
        //     $data = json_decode($requestContent, true);
        $offreMedia = self::$daoImpOffreMedia->findById(self::CLASSNAMEOFFREMEDIA, $data['id']);


        self::$daoImpOffreMedia->updateOffreMedia($offreMedia, $data);
    }

    public function deleteOffreMedia($id)
    {
        // TODO: Implement deleteOffreMedia() method.
        $offreMedia = self::$daoImpOffreMedia->findById(self::CLASSNAMEOFFREMEDIA, $id);
        self::$daoImpOffreMedia->delete($offreMedia);
    }

    public function getAllOffreMedia()
    {
        // TODO: Implement getAllOffreMedia() method.
        $offresMedia = self::$daoImpOffreMedia->findAll(self::CLASSNAMEOFFREMEDIA);


        return $offresMedia;
    }

    public function getOffreMedia($id)
    {
        // TODO: Implement getOffreMedia() method.
        $offreMedia = self::$daoImpOffreMedia->findById(self::CLASSNAMEOFFREMEDIA, $id);

        return $offreMedia;
    }
}