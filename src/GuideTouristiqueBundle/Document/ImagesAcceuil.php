<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 09:21
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\document
 */
class ImagesAcceuil extends Image
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /** @MongoDB\Field(type="bool") */
    protected $slide;

    /**
     * ImagesAcceuil constructor.
     * @param $id
     * @param $slide
     */
    public function __construct($slide, $nom, $alt, $type, $uploadDate, $taille, $media)
    {
        parent::__construct($nom, $alt, $type, $uploadDate, $taille, $media);
        $this->slide = $slide;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param mixed $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getUploadDate()
    {
        return $this->uploadDate;
    }

    /**
     * @param mixed $uploadDate
     */
    public function setUploadDate($uploadDate)
    {
        $this->uploadDate = $uploadDate;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * @param mixed $taille
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    /**
     * @return mixed
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * @param mixed $alt
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
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
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * @param mixed $slide
     */
    public function setSlide($slide)
    {
        $this->slide = $slide;
    }


}