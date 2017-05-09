<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 09:58
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class OffreMedia extends Offre
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $nbre_media;

    /**
     * OffreMedia constructor.
     * @param $nbre_media
     */
    public function __construct($nbre_media, $nom, $description, $prix, $duree)
    {

        parent::__construct($nom, $description, $prix, $duree);
        $this->nbre_media = $nbre_media;
    }

    /**
     * Get nbreMedia
     *
     * @return int $nbreMedia
     */
    public function getNbreMedia()
    {
        return $this->nbre_media;
    }

    /**
     * Set nbreMedia
     *
     * @param int $nbreMedia
     * @return $this
     */
    public function setNbreMedia($nbreMedia)
    {
        $this->nbre_media = $nbreMedia;
        return $this;
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

    /**
     * Set nom
     *
     * @param string $nom
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
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
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * Set prix
     *
     * @param float $prix
     * @return self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
     * Set duree
     *
     * @param int $duree
     * @return self
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
        return $this;
    }

    /**
     * Get duree
     *
     * @return int $duree
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set devise
     *
     * @param string $devise
     * @return self
     */
    public function setDevise($devise)
    {
        $this->devise = $devise;
        return $this;
    }

    /**
     * Get devise
     *
     * @return string $devise
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set image
     *
     * @param GuideTouristiqueBundle\Document\Image $image
     * @return self
     */
    public function setImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->image = $image;
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
     * Set remise
     *
     * @param string $remise
     * @return self
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;
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
     * Set etat
     *
     * @param GuideTouristiqueBundle\Document\Etat $etat
     * @return self
     */
    public function setEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat = $etat;
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
}
