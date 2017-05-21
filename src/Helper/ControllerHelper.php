<?php
/**
 * Created by PhpStorm.
 * User: fara7
 * Date: 12/03/2017
 * Time: 08:19
 */

namespace GuideTouristiqueBundle\Helper;

use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Response;

trait ControllerHelper
{
    /**
     * Set base HTTP headers.
     *
     * @param Response $response
     *
     * @return Response
     */
    private function setBaseHeaders(Response $response)
    {
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    /**
     * Data serializing via JMS serializer.
     *
     * @param mixed $data
     *
     * @return string JSON string
     */
    private function serialize($data)
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        return $this->get('jms_serializer')->serialize($data, 'json', $context);
    }

}