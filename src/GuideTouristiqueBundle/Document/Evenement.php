<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 18:24
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Evenement
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datepublication;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datedebutevenement;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datefinevenement;


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
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * Evenement constructor.
     * @param $datepublication
     * @param $datedebutevenement
     * @param $datefinevenement
     * @param $nom
     * @param $description
     * @param $lieu
     * @param $dateAjout
     * @param $dateModification
     * @param $etat
     */
    public function __construct($datepublication, $datedebutevenement, $datefinevenement, $nom, $description, $lieu, $dateAjout, $dateModification, $etat)
    {
        $this->datepublication = $datepublication;
        $this->datedebutevenement = $datedebutevenement;
        $this->datefinevenement = $datefinevenement;
        $this->nom = $nom;
        $this->description = $description;
        $this->lieu = $lieu;
        $this->dateAjout = $dateAjout;
        $this->dateModification = $dateModification;
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
    public function getDatepublication()
    {
        return $this->datepublication;
    }

    /**
     * @param mixed $datepublication
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;
    }

    /**
     * @return mixed
     */
    public function getDatedebutevenement()
    {
        return $this->datedebutevenement;
    }

    /**
     * @param mixed $datedebutevenement
     */
    public function setDatedebutevenement($datedebutevenement)
    {
        $this->datedebutevenement = $datedebutevenement;
    }

    /**
     * @return mixed
     */
    public function getDatefinevenement()
    {
        return $this->datefinevenement;
    }

    /**
     * @param mixed $datefinevenement
     */
    public function setDatefinevenement($datefinevenement)
    {
        $this->datefinevenement = $datefinevenement;
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
