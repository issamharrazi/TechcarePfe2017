<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 14/05/2017
 * Time: 18:01
 */

namespace GuideTouristiqueBundle\services;

use Symfony\Component\HttpFoundation\Response;

class SetHeaders
{


    public static function setBaseHeaders(Response $response)
    {
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }
}