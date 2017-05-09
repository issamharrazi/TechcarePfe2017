<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 13:59
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\TypePubliciteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\TypePublicite;


class TypePubliciteImpDao extends GenericImplDao implements TypePubliciteIdao
{

    public function addTypePublicite($data)
    {
        // TODO: Implement addTypePublicite() method.
        $typePublicite = new TypePublicite($data['nom'], $data['num']);
        try {


            $typePublicite = self::$documentManager->merge($typePublicite);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $typePublicite;
    }

    public function updateTypePublicite($document, $data)
    {
        // TODO: Implement updateTypePublicite() method.

        try {


            $document->setNom($data['nom']);
            $document->setNum($data['num']);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function findTypePubliciteByNum($class, $num)
    {
        // TODO: Implement findTypePubliciteByNum() method.

        $typePublicite = self::$documentManager->getRepository('GuideTouristiqueBundle:' . $class)
            ->findBy(array('num' => (int)$num));


        return $typePublicite;
    }
}