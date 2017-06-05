<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/06/2017
 * Time: 00:04
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\EtatRealisationIMetier;

class EtatRealisationImpMetier implements EtatRealisationIMetier
{
    const CLASSNAMEETATREALISATION = 'EtatRealisation';
    protected static $etatRealisationImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\EtatRealisationIdao $etatRealisationImpdao)
    {


        self::$etatRealisationImpdao = $etatRealisationImpdao;

    }

    public function addEtatRealisation($data)
    {
        // TODO: Implement addEtatRealisation() method.
        return static::$etatRealisationImpdao->addEtatRealisation($data);

    }

    public function updateEtatRealisation($data)
    {
        // TODO: Implement updateEtatRealisation() method.
        $etat = static::$etatRealisationImpdao->findById(self::CLASSNAMEETATREALISATION, $data['id']);


        static::$etatRealisationImpdao->updateEtatRealisation($etat, $data);
    }

    public function deleteEtatRealisation($id)
    {
        // TODO: Implement deleteEtatRealisation() method.
        $etat = static::$etatRealisationImpdao->findById(self::CLASSNAMEETATREALISATION, $id);
        static::$etatRealisationImpdao->delete($etat);

    }

    public function getAllEtatsRealisation()
    {
        // TODO: Implement getAllEtatsRealisation() method.
        $etats = static::$etatRealisationImpdao->findAll(self::CLASSNAMEETATREALISATION);


        return $etats;
    }

    public function getEtatRealisation($id)
    {
        // TODO: Implement getEtatRealisation() method.
        $etat = static::$etatRealisationImpdao->findById(self::CLASSNAMEETATREALISATION, $id);


        // TODO: Implement getEtat() method.
        return $etat;
    }

    public function getEtatRealisationByNum($num)
    {
        // TODO: Implement getEtatRealisationByNum() method.
        $etat = static::$etatRealisationImpdao->findEtatRealisationByNum(self::CLASSNAMEETATREALISATION, $num)[0];


        return $etat;
    }
}