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
     * @MongoDB\Field(type="string")
     */
    private $nom;

    /**
     * Langue constructor.
     * @param $nom
     */
    public function __construct($nom)
    {
        $this->nom = $nom;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


}
