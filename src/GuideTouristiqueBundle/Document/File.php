<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 13/04/2017
 * Time: 16:38
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
abstract class File
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /** @MongoDB\Field(type="string") */
    protected $media;

    /** @MongoDB\Field(type="string") */
    protected $nom;

    /** @MongoDB\Field(type="string") */
    protected $type;

    /** @MongoDB\Field(type="string") */
    protected $uploadDate;
    /** @MongoDB\Field(type="int") */
    protected $taille;


}
