<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 12/04/2017
 * Time: 10:23
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\PackIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Pack;

class PackImpDao extends GenericImplDao implements PackIdao
{

    public function addPack($data)
    {
        // TODO: Implement add() method.


        $pack = new Pack();

        if (isset($data['cpackImage'])) {
            $pack->setCpackImage($data['cpackImage']);
        } elseif (isset($data['cpackFicheTechnique'])) {
            $pack->setCpackFicheTchnique($data['cpackFicheTechnique']);
        } elseif (isset($data['cpackVideo'])) {
            $pack->setCpackVideo($data['cpackVideo']);
        } elseif (isset($data['cpackPublicite'])) {
            $pack->setCpackPublicite($data['cpackPublicite']);
        }


        try {


            $pack = self::$documentManager->merge($pack);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $pack;

    }


    public function updatePack($pack, $data)
    {
        // TODO: Implement update() method.

        try {
            /* $pack->setCpackFicheTchnique($data['cpackFicheTechnique']);
             self::$documentManager->merge($pack);
             self::$documentManager->flush();*/


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}