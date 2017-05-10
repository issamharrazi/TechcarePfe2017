<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 10:44
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CpackFicheTechniqueIMetier;
use GuideTouristiqueBundle\services\Serialiser;

class CpackFicheTechniqueImpMetier implements CpackFicheTechniqueIMetier
{

    const CLASSNAMECPACK_FICHE_TECHNIQUE = 'CpackFicheTechnique';
    protected static $metierImpOffre;
    protected static $metierImpCategorie;
    protected static $metierImpFicheTechnique;
    protected static $impdaoCpackFicheTechnique;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\CpackFicheTechniqueIdao $impdaoCpackFicheTechnique, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\OffreFicheTechniqueIMetier $metierImpOffre, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\CategorieIMetier $metierImpCategorie, \GuideTouristiqueBundle\Metier\IMetier\PackIMetier\FicheTechniqueIMetier $metierImpFicheTechnique)
    {


        self::$impdaoCpackFicheTechnique = $impdaoCpackFicheTechnique;
        self::$metierImpOffre = $metierImpOffre;
        self::$metierImpCategorie = $metierImpCategorie;

        self::$metierImpFicheTechnique = $metierImpFicheTechnique;

    }


    public function addCpackFicheTechnique($data)
    {
        // TODO: Implement addCpackFicheTechnique() method.


        //  $data = json_decode($requestContent, true);

        $data['ficheTechnique'] = self::$metierImpFicheTechnique->addFicheTechnique($data['ficheTechnique']);

        $data['offre'] = self::$metierImpOffre->getOffreFicheTechnique($data['offre']['id']);

        $data['categorie'] = self::$metierImpCategorie->getCategorieByNum(1);

        $cpackFicheTechnique = self::$impdaoCpackFicheTechnique->addCpackFicheTechnique($data);
        return $cpackFicheTechnique;
    }

    public function updateCpackFicheTechnique($requestContent)
    {
        // TODO: Implement updateCpackFicheTechnique() method.

        $data = $requestContent;

        $cpackFicheTechnique = self::$impdaoCpackFicheTechnique->findById(self::CLASSNAMECPACK_FICHE_TECHNIQUE, $data['id']);

        /*        $data['categorie'] = self::$sdmCategorie->findById(self::CLASSNAMECATEGORIE,$data['categorie']['id']);
                $data['offre'] = self::$sdmOffre->findById(self::CLASSNAMEOFFRE,$data['offre']['id']);
                $data['ficheTechnique'] = self::$sdmOffre->findById(self::CLASSNAMEOFFRE,$data['offre']['id']);

                static::$sdmFicheTechnique->updateFichTechnique($cpackFicheTechnique,$data);*/

    }

    public function deleteCpackFicheTechnique($id)
    {
        // TODO: Implement deleteCpackFicheTechnique() method.
        /*  $ficheTechnique = self::$sdmFicheTechnique->findById(self::CLASSNAMEFicheTechnique,$id);
          self::$sdmFicheTechnique->delete($ficheTechnique);*/
    }

    public function getAllCpackFicheTechnique()
    {
        // TODO: Implement getAllCpackFicheTechnique() method.
        $ficheTechniques = self::$metierImpFicheTechnique->getAllFicheTechnique();


        $ficheTechniquesJson = Serialiser::serializer($ficheTechniques);

        return $ficheTechniquesJson;
    }

    public function getCpackFicheTechnique($id)
    {
        // TODO: Implement getCpackFicheTechnique() method.
    }


}