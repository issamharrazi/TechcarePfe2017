<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 10:19
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\LangueIMetier;

class LangueImpMetier implements LangueIMetier
{

    const CLASSNAMELANGUE = 'Langue';

    protected static $etatImpMetier;


    protected static $langueImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\LangueIdao $idaoImpLangue, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {

        self::$langueImpdao = $idaoImpLangue;


        self::$etatImpMetier = $etatImpMetier;


    }

    public function addLangue($data)
    {
        // TODO: Implement addLangue() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $langue = self::$langueImpdao->addLangue($data);

        return $langue;
    }

    public function updateLangue($data)
    {
        // TODO: Implement updateLangue() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        // TODO: Implement updateCategorie() method.

        $langue = self::$langueImpdao->findById(self::CLASSNAMELANGUE, $data['id']);
        return self::$langueImpdao->updateLangue($langue, $data);

    }

    public function deleteLangue($id)
    {
        // TODO: Implement deleteLangue() method.
        $langue = self::$langueImpdao->findById(self::CLASSNAMELANGUE, $id);


        self::$langueImpdao->delete($langue);

    }

    public function getAllLangues()
    {
        // TODO: Implement getAllLangues() method.
        $langues = self::$langueImpdao->findAll(self::CLASSNAMELANGUE);


        return $langues;
    }


    public function getLangue($id)
    {
        // TODO: Implement getLangue() method.
        $langue = self::$langueImpdao->findById(self::CLASSNAMELANGUE, $id);


        return $langue;
    }

    public function getLangueByNom($nom)
    {
        // TODO: Implement getLangueByNom() method.
        $langue = self::$langueImpdao->findLangueByName(self::CLASSNAMELANGUE, $nom);

        return $langue;
    }

    public function findAllActivatedLangues()
    {
        // TODO: Implement findAllActivatedLangues() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $langues = static::$langueImpdao->findAllActivated(self::CLASSNAMELANGUE);

        return $langues;
    }
}