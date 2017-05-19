<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 10:47
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier;

class AdresseImpMetier implements AdresseIMetier
{
    const CLASSNAMEADRESSE = 'Adresse';
    protected static $adresseImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\AdresseIdao $adresseImpdao)
    {


        self::$adresseImpdao = $adresseImpdao;

    }

    public function addAdresse($data)
    {
        // TODO: Implement addAdresse() method.
        return static::$adresseImpdao->addAdresse($data);

    }

    public function updateAdresse($data)
    {
        // TODO: Implement updateAdresse() method.
        $adresse = static::$adresseImpdao->findById(self::CLASSNAMEADRESSE, $data['id']);

        return static::$adresseImpdao->updateAdresse($adresse, $data);

    }

    public function deleteAdresse($id)
    {
        // TODO: Implement deleteAdresse() method.
        $adresse = static::$adresseImpdao->findById(self::CLASSNAMEADRESSE, $id);
        static::$adresseImpdao->delete($adresse);

    }

    public function getAllAdresses()
    {
        // TODO: Implement getAllAdresses() method.
        return static::$adresseImpdao->findAll(self::CLASSNAMEADRESSE);

    }

    public function getAdresse($id)
    {
        // TODO: Implement getAdresse() method.
        return static::$adresseImpdao->findById(self::CLASSNAMEADRESSE, $id);


    }
}