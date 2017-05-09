<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 09:57
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class CpackImage
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="OffreImage")
     */
    private $offre;


    /**
     * @MongoDB\ReferenceMany(targetDocument="Image")
     */
    private $images = array();

    /**
     * @MongoDB\ReferenceOne(targetDocument="Categorie")
     */
    private $categorie;


    public function __construct($offre, $categorie)
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->offre = $offre;
        $this->categorie = $categorie;


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
     * @return mixed
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * @param mixed $offre
     */
    public function setOffre($offre)
    {
        $this->offre = $offre;
    }

    /**
     * Get categorie
     *
     * @return \GuideTouristiqueBundle\Document\Categorie $categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set categorie
     *
     * @param \GuideTouristiqueBundle\Document\Categorie $categorie
     * @return $this
     */
    public function setCategorie(\GuideTouristiqueBundle\Document\Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Add image
     *
     * @param \GuideTouristiqueBundle\Document\Image $image
     */
    public function addImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->images[] = $image;
    }

    /**
     * Remove image
     *
     * @param \GuideTouristiqueBundle\Document\Image $image
     */
    public function removeImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection $images
     */
    public function getImages()
    {
        return $this->images;
    }
}
