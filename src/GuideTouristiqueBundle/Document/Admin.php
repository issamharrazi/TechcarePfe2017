<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:02
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class Admin extends BaseUser
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;


    /**
     * @MongoDB\Field(type="integer")
     */
    protected $numTel;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Adresse")
     */
    private $adresse;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    private $image;

    /**
     * Get prenom
     *
     * @return string $prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return $this
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get numTel
     *
     * @return integer $numTel
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set numTel
     *
     * @param integer $numTel
     * @return $this
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
        return $this;
    }

    /**
     * Get adresse
     *
     * @return \GuideTouristiqueBundle\Document\Adresse $adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set adresse
     *
     * @param \GuideTouristiqueBundle\Document\Adresse $adresse
     * @return $this
     */
    public function setAdresse(\GuideTouristiqueBundle\Document\Adresse $adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Get image
     *
     * @return \GuideTouristiqueBundle\Document\Image $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param \GuideTouristiqueBundle\Document\Image $image
     * @return $this
     */
    public function setImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->image = $image;
        return $this;
    }
}
