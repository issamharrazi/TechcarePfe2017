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
    const CLASSNAMECLIENTVENTETYPE = 'TypeClientVente';
    protected static $ClientVenteTypeImpdao;
    protected static $etatImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\TypeClientIdao $TypeClientVenteImpdao, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {


        self::$ClientVenteTypeImpdao = $TypeClientVenteImpdao;
        self::$etatImpMetier = $etatImpMetier;

    }


    public function addClientVenteType($data)
    {
        // TODO: Implement addClientVenteType() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        return static::$ClientVenteTypeImpdao->addTypeClientVente($data);
    }

    public function updateClientVenteType($data)
    {
        // TODO: Implement updateClientVenteType() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $typeClientVente = static::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPE, $data['id']);

        return static::$ClientVenteTypeImpdao->updateTypeClientVente($typeClientVente, $data);
    }

    public function deleteClientVenteType($id)
    {
        // TODO: Implement deleteClientVenteType() method.
        $typeClientVente = static::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPE, $id);
        static::$ClientVenteTypeImpdao->delete($typeClientVente);
    }

    public function getAllClientVenteType()
    {
        // TODO: Implement getAllClientVenteType() method.
        return static::$ClientVenteTypeImpdao->findAll(self::CLASSNAMECLIENTVENTETYPE);
    }

    public function getClientVenteType($id)
    {
        $typeClientVente = static::$ClientVenteTypeImpdao->findById(self::CLASSNAMECLIENTVENTETYPE, $id);

        return $typeClientVente;
        // TODO: Implement getClientVenteType() method.
    }

    public function findAllActivatedClientVenteType()
    {
        // TODO: Implement findAllActivatedClientVenteType() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $typeClientVentes = static::$ClientVenteTypeImpdao->findAllActivated(self::CLASSNAMECLIENTVENTETYPE);

        return $typeClientVentes;
    }
}