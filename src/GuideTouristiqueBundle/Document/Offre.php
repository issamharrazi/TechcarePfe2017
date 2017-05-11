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


    /**
     * Get id
     *
     * @return int_id $id
     */
    public function getId()
    {
        return $this->id;
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
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get remise
     *
     * @return string $remise
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set remise
     *
     * @param string $remise
     * @return $this
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;
        return $this;
    }

    /**
     * Get devise
     *
     * @return GuideTouristiqueBundle\Document\Devise $devise
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set devise
     *
     * @param GuideTouristiqueBundle\Document\Devise $devise
     * @return $this
     */
    public function setDevise(\GuideTouristiqueBundle\Document\Devise $devise)
    {
        $this->devise = $devise;
        return $this;
    }

    /**
     * Get prix
     *
     * @return float $prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return $this
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
        return $this;
    }

    /**
     * Get duree
     *
     * @return GuideTouristiqueBundle\Document\Duree $duree
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set duree
     *
     * @param GuideTouristiqueBundle\Document\Duree $duree
     * @return $this
     */
    public function setDuree(\GuideTouristiqueBundle\Document\Duree $duree)
    {
        $this->duree = $duree;
        return $this;
    }

    /**
     * Get image
     *
     * @return GuideTouristiqueBundle\Document\Image $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param GuideTouristiqueBundle\Document\Image $image
     * @return $this
     */
    public function setImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get etat
     *
     * @return GuideTouristiqueBundle\Document\Etat $etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set etat
     *
     * @param GuideTouristiqueBundle\Document\Etat $etat
     * @return $this
     */
    public function setEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat = $etat;
        return $this;
    }
}
