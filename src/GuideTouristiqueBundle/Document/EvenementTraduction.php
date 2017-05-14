<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 18:25
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class EvenementTraduction
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
     * @MongoDB\Field(type="string")
     */
    private $description;

    /**
     * @MongoDB\Field(type="string")
     */
    private $lieu;


    /**
     * @MongoDB\Field(type="string")
     */
    private $dateAjout;

    /**
     * @MongoDB\Field(type="string")
     */
    private $dateModification;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Langue")
     */
    private $langue;

    /**
     * EvenementTraduction constructor.
     * @param $nom
     * @param $description
     * @param $lieu
     * @param $dateAjout
     * @param $dateModification
     * @param $langue
     */
    public function __construct($nom, $description, $lieu, $dateAjout, $dateModification, $langue)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->lieu = $lieu;
        $this->dateAjout = $dateAjout;
        $this->dateModification = $dateModification;
        $this->langue = $langue;
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * @param mixed $dateModification
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param mixed $langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
    }


    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId()
    {
        return $this->id;
    }
}
