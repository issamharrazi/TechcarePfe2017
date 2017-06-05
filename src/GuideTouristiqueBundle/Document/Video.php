<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 15/04/2017
 * Time: 00:07
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Video extends File
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    public function __construct($nom, $type, $uploadDate, $taille, $media)
    {
        $this->media = $media;
        $this->nom = $nom;
        $this->type = $type;
        $this->uploadDate = $uploadDate;

        $this->taille = $taille;

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
     * Get media
     *
     * @return string $media
     */
    public function getMedia()
    {
        return $this->media;
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
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
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
     * Get uploadDate
     *
     * @return string $uploadDate
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
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

    /**
     * Get taille
     *
     * @return int $taille
     */
    public function getTaille()
    {
        return $this->taille;
    }
}
