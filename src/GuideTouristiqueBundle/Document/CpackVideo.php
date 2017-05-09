<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 19:16
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class CpackVideo
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="OffreVideo")
     */
    private $offre;


    /**
     * @MongoDB\ReferenceMany(targetDocument="Video")
     */
    private $videos = array();

    /**
     * @MongoDB\ReferenceOne(targetDocument="Categorie")
     */
    private $categorie;


    public function __construct($offre, $categorie)
    {
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get offre
     *
     * @return \GuideTouristiqueBundle\Document\OffreVideo $offre
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set offre
     *
     * @param \GuideTouristiqueBundle\Document\OffreVideo $offre
     * @return self
     */
    public function setOffre(\GuideTouristiqueBundle\Document\OffreVideo $offre)
    {
        $this->offre = $offre;
        return $this;
    }

    /**
     * Add video
     *
     * @param \GuideTouristiqueBundle\Document\Video $video
     */
    public function addVideo(\GuideTouristiqueBundle\Document\Video $video)
    {
        $this->videos[] = $video;
    }

    /**
     * Remove video
     *
     * @param \GuideTouristiqueBundle\Document\Video $video
     */
    public function removeVideo(\GuideTouristiqueBundle\Document\Video $video)
    {
        $this->videos->removeElement($video);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection $videos
     */
    public function getVideos()
    {
        return $this->videos;
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
     * @return self
     */
    public function setCategorie(\GuideTouristiqueBundle\Document\Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }
}
