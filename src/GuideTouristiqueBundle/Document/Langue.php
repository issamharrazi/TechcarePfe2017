<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 17:15
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Langue
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;


    /**
     * @MongoDB\Field(type="bool")
     */
    private $default;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;


    /**
     * Langue constructor.
     */
    public function __construct($etat, $default)
    {
        $this->default = $default;
        $this->etat = $etat;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


}
