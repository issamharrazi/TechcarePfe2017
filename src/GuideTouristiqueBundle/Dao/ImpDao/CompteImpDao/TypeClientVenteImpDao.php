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
use GuideTouristiqueBundle\Document\User;

class TypeClientVenteImpDao extends GenericImplDao implements TypeClientIdao
{


    public function addTypeClientVente($data)
    {
        // TODO: Implement addTypeClientVente() method.
        $typeClient = new TypeClientVente($data['nom'], $data['etat']);
        try {


            $typeClient = static::$documentManager->merge($typeClient);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $typeClient;
    }

    public function updateTypeClientVente($typeClient, $data)
    {
        // TODO: Implement updateTypeClientVente() method.
        $typeClient->setNom($data['nom']);

        $typeClient->setEtat($data['etat']);
        $typeClient = self::$documentManager->merge($typeClient);
        self::$documentManager->flush();


        return $typeClient;
    }
}