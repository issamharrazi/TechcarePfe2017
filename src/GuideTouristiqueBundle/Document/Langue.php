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
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * Langue constructor.
     * @param $nom
     */
    public function __construct($nom, $etat)
    {
        $this->nom = $nom;
        $this->etat = $etat;

    }

    /**
     *
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
