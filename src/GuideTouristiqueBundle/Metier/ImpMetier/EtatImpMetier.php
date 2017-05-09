<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 15:54
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\EtatIMetier;


class EtatImpMetier implements EtatIMetier
{

    const CLASSNAMEETAT = 'Etat';
    protected static $etatImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\EtatIdao $etatImpdao)
    {


        self::$etatImpdao = $etatImpdao;

    }


    public function addEtat($data)
    {


        // TODO: Implement addEtat() method.


        return static::$etatImpdao->addEtat($data);

    }

    public function updateEtat($data)
    {

        // TODO: Implement updateEtat() method.

        $etat = static::$etatImpdao->findById(self::CLASSNAMEETAT, $data['id']);
        var_dump($etat);


        static::$etatImpdao->updateEtat($etat, $data);


    }

    public function deleteEtat($id)
    {
        // TODO: Implement deleteEtat() method.

        $etat = static::$etatImpdao->findById(self::CLASSNAMEETAT, $id);
        static::$etatImpdao->delete($etat);


    }

    public function getAllEtats()
    {
        // TODO: Implement getAllEtat() method.
        $etats = static::$etatImpdao->findAll(self::CLASSNAMEETAT);


        return $etats;

    }

    public function getEtat($id)
    {

        $etat = static::$etatImpdao->findById(self::CLASSNAMEETAT, $id);


        // TODO: Implement getEtat() method.
        return $etat;
    }


    public function getEtatByNum($num)
    {
        // TODO: Implement getEtatByNum() method.
        $etat = static::$etatImpdao->findEtatByNum(self::CLASSNAMEETAT, $num)[0];


        return $etat;
        // TODO: Implement getEtat() method.

    }
}