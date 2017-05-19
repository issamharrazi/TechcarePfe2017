<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 20/02/2017
 * Time: 11:42
 */


namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class SuperAdmin extends Admin
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;


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
     * Get prenom
     *
     * @return string $prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
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
     * Get nom
     *
     * @return string $nom
     */
    public function getNom()
    {
        return $this->nom;
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
     * Get numTel
     *
     * @return integer $numTel
     */
    public function getNumTel()
    {
        return $this->numTel;
    }
}
