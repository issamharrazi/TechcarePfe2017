<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 15:27
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackPubliciteIMetier;

class CpackPublicteImpMetier implements CpackPubliciteIMetier
{

    const CLASSNAMECPACKPUBLICITE = 'CpackPublicite';
    protected static $metierImpOffre;
    protected static $metierImpCategorie;
    protected static $metierImpPublicite;
    protected static $impdaoCpackPublicite;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackPubliciteIdao $impdaoCpackPublicite, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffrePubliciteIMetier $metierImpOffre, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier $metierImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\PubliciteIMetier $metierImpPublicite)
    {


        self::$impdaoCpackPublicite = $impdaoCpackPublicite;
        self::$metierImpOffre = $metierImpOffre;
        self::$metierImpCategorie = $metierImpCategorie;

        self::$metierImpPublicite = $metierImpPublicite;

    }


    public function addCpackPublicite($data)
    {
        // TODO: Implement addCpackPublicite() method.

        $data['offre'] = self::$metierImpOffre->getOffrePublicite($data['offre']['id']);
        $data['publicite'] = self::$metierImpOffre->addOffrePublicite($data['publicite']);

        $data['categorie'] = self::$metierImpCategorie->getCategorieByNum(1);

        $cpackPublicite = self::$impdaoCpackPublicite->addCpackPublicite($data);
        return $cpackPublicite;

    }

    public function updateCpackPublicite($requestContent)
    {
        // TODO: Implement updateCpackPublicite() method.
    }

    public function deleteCpackPublicite($id)
    {
        // TODO: Implement deleteCpackPublicite() method.
    }

    public function getAllCpackPublicite()
    {
        // TODO: Implement getAllCpackPublicite() method.
    }

    public function getCpackPublicite($id)
    {
        // TODO: Implement getCpackPublicite() method.
    }
}