<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 13/04/2017
 * Time: 16:38
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
abstract class Media
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /** @MongoDB\Field(type="string") */
    protected $media;

    /** @MongoDB\Field(type="string") */
    protected $nom;

    /** @MongoDB\Field(type="string") */
    protected $type;

    /** @MongoDB\Field(type="string") */
    protected $uploadDate;
    /** @MongoDB\Field(type="int") */
    protected $taille;


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
     * Get media
     *
     * @return string $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set media
     *
     * @param string $media
     * @return self
     */
    public function setMedia($media)
    {
        $this->media = $media;
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
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get uploadDate
     *
     * @return string $uploadDate
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * Set uploadDate
     *
     * @param string $uploadDate
     * @return self
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;
        return $this;
    }

    /**
     * Get taille
     *
     * @return int $taille
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set taille
     *
     * @param int $taille
     * @return self
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
        return $this;
    }
}
