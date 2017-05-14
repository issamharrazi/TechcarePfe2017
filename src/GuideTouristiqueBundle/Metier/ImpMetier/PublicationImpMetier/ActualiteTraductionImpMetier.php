<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 21:16
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PublicationImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\ActualiteTraductionIMetier;

class ActualiteTraductionImpMetier implements ActualiteTraductionIMetier
{

    const CLASSNAMEACTUALITETRADUCTION = 'ActualiteTraduction';
    protected static $idaoImpActualiteTraduction;
    protected static $metierImpLangue;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\ActualiteTradutionIdao $idaoImpActualiteTraduction, \GuideTouristiqueBundle\Metier\IMetier\LangueIMetier $metierImpLangue)
    {

        self::$idaoImpActualiteTraduction = $idaoImpActualiteTraduction;
        self::$metierImpLangue = $metierImpLangue;


    }

    public function addActualiteTraduction($data)
    {
        // TODO: Implement addActualiteTraduction() method.

        $data['langue'] = self::$metierImpLangue->getLangueByNom($data['langue']['nom']);

        $actualiteTraduction = self::$idaoImpActualiteTraduction->addActualitesTraduction($data);

        return $actualiteTraduction;
    }

    public function updateActualiteTraduction($data)
    {
        // TODO: Implement updateActualiteTraduction() method.

        // TODO: Implement updateCategorie() method.

        $actualiteTraduction = self::$idaoImpActualiteTraduction->findById(self::CLASSNAMEACTUALITETRADUCTION, $data['id']);
        return self::$idaoImpActualiteTraduction->updateActualitesTraduction($actualiteTraduction, $data);

    }

    public function deleteActualiteTraduction($id)
    {
        // TODO: Implement deleteActualiteTraduction() method.
        $actualiteTraduction = self::$idaoImpActualiteTraduction->findById(self::CLASSNAMEACTUALITETRADUCTION, $id);


        self::$idaoImpActualiteTraduction->delete($actualiteTraduction);

    }

    public function getAllActualitesTraduction()
    {
        // TODO: Implement getAllActualitesTraduction() method.
        $actualitesTraduction = self::$idaoImpActualiteTraduction->findAll(self::CLASSNAMEACTUALITETRADUCTION);


        return $actualitesTraduction;
    }

    public function getActualiteTraduction($id)
    {
        // TODO: Implement getActualiteTraduction() method.
        $actualiteTraduction = self::$idaoImpActualiteTraduction->findById(self::CLASSNAMEACTUALITETRADUCTION, $id);


        return $actualiteTraduction;
    }
}