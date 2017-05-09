<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:22
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreIMetier;

class OffreImpMetier implements OffreIMetier
{
    const CLASSNAMEOFFRE = 'Offre';
    protected static $daoImpOffre;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\OffreIdao $daoImpOffre)
    {


        self::$daoImpOffre = $daoImpOffre;

    }


    public function addOffre($requestContent)
    {
        // TODO: Implement addOffre() method.

        $data = $requestContent;


        //  $data = json_decode($requestContent, true);


        $offre = self::$daoImpOffre->addOffre($data);
        return $offre;
    }

    public function updateOffre($data)
    {
        // TODO: Implement updateOffre() method.


        $offre = self::$daoImpOffre->findById(self::CLASSNAMEOFFRE, $data['id']);


        self::$daoImpOffre->updateOffre($offre, $data);


    }

    public function deleteOffre($id)
    {
        // TODO: Implement deleteOffre() method.
        $offre = self::$daoImpOffre->findById(self::CLASSNAMEOFFRE, $id);
        self::$daoImpOffre->delete($offre);
    }

    public function getAllOffre()
    {
        // TODO: Implement getAllOffre() method.
        $offres = self::$daoImpOffre->findAll(self::CLASSNAMEOFFRE);


        return $offres;
    }

    public function getOffre($id)
    {
        // TODO: Implement getOffre() method.
        $offre = self::$daoImpOffre->findById(self::CLASSNAMEOFFRE, $id);

        return $offre;
    }
}