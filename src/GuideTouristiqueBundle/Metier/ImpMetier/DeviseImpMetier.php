<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 21:55
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\DeviseIMetier;

class DeviseImpMetier implements DeviseIMetier
{
    const CLASSNAMEDEVISE = 'Devise';
    protected static $deviseImpdao;
    protected static $etatImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\DeviseIdao $deviseImpdao, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {


        self::$deviseImpdao = $deviseImpdao;
        self::$etatImpMetier = $etatImpMetier;

    }

    public function addDevise($data)
    {
        // TODO: Implement addDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        return static::$deviseImpdao->addDevise($data);

    }


    public function updateDevise($data)
    {
        // TODO: Implement updateDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $devise = static::$deviseImpdao->findById(self::CLASSNAMEDEVISE, $data['id']);

        return static::$deviseImpdao->updateDevise($devise, $data);
    }

    public function deleteDevise($id)
    {
        // TODO: Implement deleteDevise() method.
        $devise = static::$deviseImpdao->findById(self::CLASSNAMEDEVISE, $id);
        static::$deviseImpdao->delete($devise);

    }

    public function getAllDevise()
    {
        // TODO: Implement getAllDevise() method.
        return static::$deviseImpdao->findAll(self::CLASSNAMEDEVISE);

    }

    public function getDevise($id)
    {
        // TODO: Implement getDevise() method.
        $devise = static::$deviseImpdao->findById(self::CLASSNAMEDEVISE, $id);

        return $devise;
    }

    public function findAllActivatedDevise()
    {
        // TODO: Implement getDevise() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $devises = static::$deviseImpdao->findAllActivated(self::CLASSNAMEDEVISE);

        return $devises;
    }

}