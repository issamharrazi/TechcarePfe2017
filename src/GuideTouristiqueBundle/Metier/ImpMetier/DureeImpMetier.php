<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 22:39
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\DureeIMetier;

class DureeImpMetier implements DureeIMetier
{
    const CLASSNAMEDUREE = 'Duree';
    protected static $dureeImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\DureeIdao $dureeImpdao)
    {


        self::$dureeImpdao = $dureeImpdao;

    }

    public function addDuree($data)
    {
        // TODO: Implement addDuree() method.
        return static::$dureeImpdao->addDuree($data);

    }

    public function updateDuree($data)
    {
        // TODO: Implement updateDuree() method.
        $duree = static::$dureeImpdao->findById(self::CLASSNAMEDUREE, $data['id']);

        return static::$dureeImpdao->updateDuree($duree, $data);
    }

    public function deleteDuree($id)
    {
        // TODO: Implement deleteDuree() method.
        $duree = static::$dureeImpdao->findById(self::CLASSNAMEDUREE, $id);
        static::$dureeImpdao->delete($duree);
    }

    public function getAllDuree()
    {
        // TODO: Implement getAllDuree() method.
        return static::$dureeImpdao->findAll(self::CLASSNAMEDUREE);

    }

    public function getDuree($id)
    {
        // TODO: Implement getDuree() method.
        $duree = static::$dureeImpdao->findById(self::CLASSNAMEDUREE, $id);

        return $duree;
    }
}