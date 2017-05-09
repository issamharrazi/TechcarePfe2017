<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 21:40
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\DeviseIdao;
use GuideTouristiqueBundle\Document\Devise;

class DeviseImpDao extends GenericImplDao implements DeviseIdao
{

    public function addDevise($data)
    {
        // TODO: Implement addDevise() method.
        $devise = new Devise($data['nom'], $data['code'], $data['codeHtml'], $data['etat']);
        try {


            $devise = static::$documentManager->merge($devise);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $devise;
    }

    public function updateDevise($devise, $data)
    {
        // TODO: Implement updateDevise() method.

        $devise->setNom($data['nom']);
        $devise->setCode($data['code']);
        $devise->setCodeHtml($data['codeHtml']);
        $devise->setEtat($data['etat']);
        $devise = self::$documentManager->merge($devise);
        self::$documentManager->flush();


        return $devise;
    }


}