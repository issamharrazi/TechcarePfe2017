<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:03
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
abstract class Offre
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $description;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $remise;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Devise")
     */
    protected $devise;


    /**
     * @MongoDB\Field(type="float")
     */
    protected $prix;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Duree")
     */
    protected $duree;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    protected $image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etat;


}
