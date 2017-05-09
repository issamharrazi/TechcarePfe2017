<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 07/04/2017
 * Time: 17:02
 */

namespace GuideTouristiqueBundle\services;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Serialiser
{

    private static $serializer;

    public static function serializer($document)
    {

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        self::$serializer = new Serializer($normalizers, $encoders);

        return self::$serializer->serialize($document, 'json');
    }
}