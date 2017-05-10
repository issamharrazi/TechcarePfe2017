<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:51
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackVisiteVirtuelleIMetier;
use GuideTouristiqueBundle\services\Serialiser;

class CpackVisiteVirtuelleImpMetier implements CpackVisiteVirtuelleIMetier
{

    const CLASSNAMECPACK_VISITE_VIRTUELLE = 'CpackVisiteVirtuelle';
    protected static $metierImpOffre;
    protected static $metierImpCategorie;
    protected static $metierImpVisiteVirtuelle;
    protected static $impdaoCpackVisiteVirtuelle;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackVisiteVirtuelleIdao $impdaoCpackVisiteVirtuelle, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreVisiteVirtuelleIMetier $metierImpOffre, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier $metierImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\VisiteVirtuelleIMetier $metierImpVisiteVirtuelle)
    {


        self::$impdaoCpackVisiteVirtuelle = $impdaoCpackVisiteVirtuelle;
        self::$metierImpOffre = $metierImpOffre;
        self::$metierImpCategorie = $metierImpCategorie;

        self::$metierImpVisiteVirtuelle = $metierImpVisiteVirtuelle;

    }


    public function addCpackVisiteVirtuelle($data)
    {
        // TODO: Implement addCpackVisiteVirtuelle() method.
        $data['visitevirtuelle'] = self::$metierImpVisiteVirtuelle->addVisiteVirtuelle($data['visitevirtuelle']);

        $data['offre'] = self::$metierImpOffre->getOffreVisiteVirtuelle($data['offre']['id']);

        $data['categorie'] = self::$metierImpCategorie->getCategorieByNum(1);

        $cpackVisiteVirtuelle = self::$impdaoCpackVisiteVirtuelle->addCpackVisiteVirtuelle($data);
        return $cpackVisiteVirtuelle;

    }

    public function updateCpackVisiteVirtuelle($requestContent)
    {
        // TODO: Implement updateCpackVisiteVirtuelle() method.
    }

    public function deleteCpackVisiteVirtuelle($id)
    {
        // TODO: Implement deleteCpackVisiteVirtuelle() method.
    }

    public function getAllCpackVisiteVirtuelle()
    {
        // TODO: Implement getAllCpackVisiteVirtuelle() method.
        $visiteVirtuelles = self::$metierImpVisiteVirtuelle->getAllVisiteVirtuelles();


        $visiteVirtuellesJson = Serialiser::serializer($visiteVirtuelles);

        return $visiteVirtuellesJson;

    }

    public function getCpackVisiteVirtuelle($id)
    {
        // TODO: Implement getCpackVisiteVirtuelle() method.
    }
}