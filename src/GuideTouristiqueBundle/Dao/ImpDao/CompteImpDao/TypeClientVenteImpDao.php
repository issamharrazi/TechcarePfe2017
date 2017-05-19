<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 14:27
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\TypeClientIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\TypeClientVente;
use GuideTouristiqueBundle\Document\TypeClientVenteTraduction;
use GuideTouristiqueBundle\Document\User;

class TypeClientVenteImpDao extends GenericImplDao implements TypeClientIdao
{


    public function addTypeClientVenteTraduction($data)
    {
        // TODO: Implement addTypeClientVenteTraduction() method.
        $ClientVenteTra = new TypeClientVenteTraduction($data['typeetablissement'], $data['type'], $data['langue']);
        try {


            $ClientVenteTra = static::$documentManager->merge($ClientVenteTra);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $ClientVenteTra;
    }


    public function addTypeClientVente($data)
    {

        $ClientVenteTra = [];
        // TODO: Implement addTypeClientVente() method.
        try {

            $type = new TypeClientVente($data['type']['etat']);

            $type = static::$documentManager->merge($type);
            foreach ($data['TypeClientVenteTraduction'] as $ClientVenteTra) {
                $ClientVenteTr = new TypeClientVenteTraduction($data['TypeClientVenteTraduction']['typeetablissement'], $type, $data['TypeClientVenteTraduction']['langue']);
                $ClientVenteTra[] = static::$documentManager->merge($ClientVenteTr);


            }


            static::$documentManager->flush();

            return $ClientVenteTra;
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }

    public function updateTypeClientVenteTraduction($ClientVenteTra, $data)
    {

        // TODO: Implement updateTypeClientVente() method.
        $ClientVenteTra->setTypeetablissement($data['typeetablissement']);
        $ClientVenteTra->getType()->setEtat($data['type']['etat']);


        $ClientVenteTra = self::$documentManager->merge($ClientVenteTra);
        self::$documentManager->flush();


        return $ClientVenteTra;
    }

    public function findAllActivatedByLang($class, $lang)
    {
        // TODO: Implement findAllActivatedByLang() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
                ->findBy(array('langue.nom' => $lang, 'type.etat.num' => 1));

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}