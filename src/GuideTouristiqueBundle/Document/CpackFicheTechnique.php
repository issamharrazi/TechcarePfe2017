<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 09:01
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class CpackFicheTechnique
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;


    /**
     * @MongoDB\ReferenceOne(targetDocument="OffreFicheTechnique")
     */
    private $offre;


    /**
     * @MongoDB\ReferenceOne(targetDocument="FicheTechnique")
     */
    private $ficheTechnique;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Categorie")
     */
    private $categorie;

    /**
     * cpackFicheTechnique constructor.
     * @param $offre
     * @param $ficheTechnique
     * @param $categorie
     */
    public function __construct($offre, $ficheTechnique, $categorie)
    {
        $this->offre = $offre;

        $this->ficheTechnique = $ficheTechnique;
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
     * Get ficheTechnique
     *
     */
    public function getFicheTechnique()
    {
        return $this->ficheTechnique;
    }

    /**
     * Set ficheTechnique
     *
     * @return $this
     */
    public function setFicheTechnique(\GuideTouristiqueBundle\Document\FicheTechnique $ficheTechnique)
    {
        $this->ficheTechnique = $ficheTechnique;
        return $this;
    }

    /**
     * Get categorie
     *
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set categorie
     *
     * @return $this
     */
    public function setCategorie(\GuideTouristiqueBundle\Document\Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }
}
