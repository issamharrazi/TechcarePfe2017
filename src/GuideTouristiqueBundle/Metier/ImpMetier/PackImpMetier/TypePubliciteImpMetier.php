<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 14:05
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\TypePubliciteIMetier;


class TypePubliciteImpMetier implements TypePubliciteIMetier
{

    const CLASSNAMETYPEPUBLICITE = 'TypePublicite';
    protected static $typePubliciteImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\TypePubliciteIdao $typePubliciteImpdao)
    {


        self::$typePubliciteImpdao = $typePubliciteImpdao;

    }


    public function addTypePublicite($data)
    {
        // TODO: Implement addTypePublicite() method.
        return static::$typePubliciteImpdao->addTypePublicite($data);
    }

    public function updateTypePublicite($data)
    {
        // TODO: Implement updateTypePublicite() method.
        $typePublicite = static::$typePubliciteImpdao->findById(self::CLASSNAMETYPEPUBLICITE, $data['id']);


        static::$typePubliciteImpdao->updateTypePublicite($typePublicite, $data);

    }

    public function deleteTypePublicite($id)
    {
        // TODO: Implement deleteTypePublicite() method.
        $typePublicite = static::$typePubliciteImpdao->findById(self::CLASSNAMETYPEPUBLICITE, $id);
        static::$typePubliciteImpdao->delete($typePublicite);

    }

    public function getAllTypePublicites()
    {
        // TODO: Implement getAllTypePublicites() method.

        $typePublicites = static::$typePubliciteImpdao->findAll(self::CLASSNAMETYPEPUBLICITE);


        return $typePublicites;
    }

    public function getTypePublicite($id)
    {
        // TODO: Implement getTypePublicite() method.
        $typePublicite = static::$typePubliciteImpdao->findById(self::CLASSNAMETYPEPUBLICITE, $id);


        // TODO: Implement getEtat() method.
        return $typePublicite;
    }

    public function getTypePubliciteByNum($num)
    {
        // TODO: Implement getTypePubliciteByNum() method.
        $typePublicite = static::$typePubliciteImpdao->findTypePubliciteByNum(self::CLASSNAMETYPEPUBLICITE, $num)[0];


        return $typePublicite;
    }
}