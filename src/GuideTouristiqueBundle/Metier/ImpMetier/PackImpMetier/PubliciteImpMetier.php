<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 14:54
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\PubliciteIMetier;

class PubliciteImpMetier implements PubliciteIMetier
{
    const CLASSNAMECPACKIMAGE = 'Publicite';
    protected static $metierImpType;
    protected static $metierImpImage;
    protected static $impdaoPublicite;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\PubliciteIdao $impdaoPublicite, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\TypePubliciteIMetier $metierImpType, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $metierImpImage)
    {


        self::$impdaoPublicite = $impdaoPublicite;
        self::$metierImpType = $metierImpType;

        self::$metierImpImage = $metierImpImage;

    }


    public function addPublicite($data)
    {
        // TODO: Implement addPublicite() method.


        $data['type'] = self::$metierImpType->getTypePublicite($data['type']['id']);


        for ($i = 0; $i < count($data['images']); $i++) {

            $data['images'][$i] = self::$metierImpImage->addImage($data['images'][$i]);
        }


        $publicite = self::$impdaoPublicite->addPublicite($data);

        return $publicite;

    }

    public function updatePublicite($requestContent)
    {
        // TODO: Implement updatePublicite() method.
    }

    public function deletePublicite($id)
    {
        // TODO: Implement deletePublicite() method.
    }

    public function getAllPublicites()
    {
        // TODO: Implement getAllPublicites() method.
    }

    public function getPublicite($id)
    {
        // TODO: Implement getPublicite() method.
    }
}