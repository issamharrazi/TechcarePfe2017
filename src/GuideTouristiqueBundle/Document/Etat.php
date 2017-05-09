<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 15:30
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Etat
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $nom;
    /**
     * @MongoDB\Field(type="int")
     */
    private $num;

    /**
     * Etat constructor.
     * @param $nom
     */
    public function __construct($nom, $num)
    {
        $this->nom = $nom;
        $this->num = $num;
    }

    /**
     * Get id
     *
     *
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
     * Get nom
     *
     * @return string $nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get num
     *
     * @return int $num
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set num
     *
     * @param int $num
     * @return $this
     */
    public function setNum($num)
    {
        $this->num = $num;
        return $this;
    }
}
