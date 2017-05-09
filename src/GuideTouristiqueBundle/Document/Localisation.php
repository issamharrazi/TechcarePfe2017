<?php
/**
 * Created by PhpStorm.
 * User: fara7
 * Date: 17/04/2017
 * Time: 10:41
 */


namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class Localisation
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $longitude;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $latitude;

}