<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 00:22
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\FicheTechniqueIMetier;

class FicheTechniqueImpMetier implements FicheTechniqueIMetier
{
    const CLASSNAMEFicheTechnique = 'FicheTechnique';
    protected static $impdaoFicheTechnique;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\FicheTechniqueIdao $impdaoFicheTechnique)
    {


        self::$impdaoFicheTechnique = $impdaoFicheTechnique;


    }

    public function addFicheTechnique($requestContent)
    {
        // TODO: Implement addFicheTechnique() method.

        $data = $requestContent;


        $ficheTechnique = self::$impdaoFicheTechnique->addFicheTechnique($data);
        return $ficheTechnique;
    }

    public function updateFicheTechnique($requestContent)
    {
        // TODO: Implement updateFicheTechnique() method.


        $data = $requestContent;

        $ficheTechnique = self::$impdaoFicheTechnique->findById(self::CLASSNAMEFicheTechnique, $data['id']);


        self::$impdaoFicheTechnique->updateFicheTechnique($ficheTechnique, $data);

        // var_dump($ficheTechnique);


    }

    public function deleteFicheTechnique($id)
    {
        // TODO: Implement deleteFicheTechnique() method.
        $ficheTechnique = self::$impdaoFicheTechnique->findById(self::CLASSNAMEFicheTechnique, $id);
        self::$impdaoFicheTechnique->delete($ficheTechnique);
    }

    public function getAllFicheTechnique()
    {
        // TODO: Implement getAllFicheTechnique() method.
        $ficheTechniques = static::$impdaoFicheTechnique->findAll(self::CLASSNAMEFicheTechnique);


        return $ficheTechniques;
    }

    public function getFicheTechnique($id)
    {
        // TODO: Implement getFicheTechnique() method.
    }
}