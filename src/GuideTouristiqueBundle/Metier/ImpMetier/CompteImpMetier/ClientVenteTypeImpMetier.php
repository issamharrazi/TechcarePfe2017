<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 15:11
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ClientVenteTypeIMetier;

class ClientVenteTypeImpMetier implements ClientVenteTypeIMetier
{
    const CLASSNAMECLIENTVENTETYPE = 'ClientVenteType';
    const CLASSNAMECLIENTVENTETYPETRADUCTION = 'ClientVenteTypeTraduction';
    protected static $ClientVenteTypeImpdao;
    protected static $etatImpMetier;
    protected static $langImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\TypeClientIdao $TypeClientVenteImpdao, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\LangueIMetier $langImpMetier)
    {


        self::$ClientVenteTypeImpdao = $TypeClientVenteImpdao;
        self::$etatImpMetier = $etatImpMetier;
        self::$langImpMetier = $langImpMetier;

    }

    //get all traductions
    public function getAllClientVenteType()
    {
        // TODO: Implement getAllClientVenteType() method.

        return static::$ClientVenteTypeImpdao->findAll(self::CLASSNAMECLIENTVENTETYPETRADUCTION);
    }


    public function getAllClientVenteTypeByLang($nomLang)
    {
        // TODO: Implement getAllClientVenteTypeByLang() method.
        return static::$ClientVenteTypeImpdao->findAllByLang(self::CLASSNAMECLIENTVENTETYPETRADUCTION, $nomLang);

    }

    public function getAllActivatedClientVenteTypesByLang($nomLang)
    {
        // TODO: Implement getAllActivatedClientVenteTypesByLang() method.
        return static::$ClientVenteTypeImpdao->findAllActivatedByLang(self::CLASSNAMECLIENTVENTETYPETRADUCTION, $nomLang);


    }

    public function getClientVenteType($id)
    {
        // TODO: Implement getClientVenteType() method.
        return self::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPETRADUCTION, $id);

    }

    public function deleteClientVenteType($id)
    {
        // TODO: Implement deleteClientVenteType() method.
        $ClientVenteType = self::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPETRADUCTION, $id);


        self::$ClientVenteTypeImpdao->delete($ClientVenteType);

    }

    public function addClientVenteType($data)
    {
        // TODO: Implement addClientVenteType() method.
        $data['type']['etat'] = self::$etatImpMetier->getEtatByNum(1);

        $data['langue'] = self::$langImpMetier->getLangue($data['langue']);


        $typeClientVente = self::$ClientVenteTypeImpdao->addTypeClientVente($data);

        return $typeClientVente;

    }

    public function addClientVenteTypeTraduction($data)
    {
        // TODO: Implement addClientVenteTypeTraduction() method.
        $data['type'] = self::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPE, $data['type']['id']);

        $data['langue'] = self::$langImpMetier->getLangue($data['langue']);


        $typeClientVenteTrad = self::$ClientVenteTypeImpdao->addTypeClientVenteTraduction($data);

        return $typeClientVenteTrad;
    }

    public function updateClientVenteTypeTraduction($data)
    {
        // TODO: Implement updateClientVenteTypeTraduction() method.
        $data['type']['etat'] = self::$etatImpMetier->getEtatByNum($data['type']['etat']['num']);

        // TODO: Implement updateCategorie() method.

        $typeClientVente = self::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPETRADUCTION, $data['id']);
        return self::$ClientVenteTypeImpdao->updateTypeClientVenteTraduction($typeClientVente, $data);

    }
}