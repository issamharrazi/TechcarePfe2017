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
    const CLASSNAMELANGUETRADUCTION = 'LangueTraduction';

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


        $res = self::$langueImpdao->addLangue($data);

        return $res;
    }

    public function updateLangueTraduction($data)
    {

        // TODO: Implement updateCategorie() method.
        foreach ($data as $langueTr) {
            $langu = self::$langueImpdao->findById(self::CLASSNAMELANGUETRADUCTION, $langueTr['id']);
            self::$langueImpdao->updateLangueTraduction($langu, $langueTr);

        }

    }

    public function updateLangue($data)
    {

        // TODO: Implement updateCategorie() method.
        foreach ($data as $langueTr) {
            $langu = self::$langueImpdao->findById(self::CLASSNAMELANGUE, $langueTr['id']);
            self::$langueImpdao->updateLangueTraduction($langu, $langueTr);

        }

    }

    /*   public function deleteLangue($id)
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
       }*/
    public function getDefaultLangue()
    {
        // TODO: Implement getDefaultLangue() method.
        $languetr = self::$langueImpdao->selectActivatedDefaultLangues();


        return $languetr;
    }

    public function getTraductionsLangue($id)
    {
        // TODO: Implement getTraductionsLangue() method.
        $languetr = self::$langueImpdao->selectTraductionsLangue($id);


        return $languetr;
    }
}