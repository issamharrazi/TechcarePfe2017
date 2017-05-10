<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:34
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class CpackVisiteVirtuelle
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="OffreVisiteVirtuelle")
     */
    private $offre;


    /**
     * @MongoDB\ReferenceOne(targetDocument="VisiteVirtuelle")
     */
    private $visiteVirtuelle;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Categorie")
     */
    private $categorie;


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
     * @return \GuideTouristiqueBundle\Document\OffreVisiteVirtuelle $offre
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set offre
     *
     * @param \GuideTouristiqueBundle\Document\OffreVisiteVirtuelle $offre
     * @return $this
     */
    public function setOffre(\GuideTouristiqueBundle\Document\OffreVisiteVirtuelle $offre)
    {
        $this->offre = $offre;
        return $this;
    }

    /**
     * Get visiteVirtuelle
     *
     * @return \GuideTouristiqueBundle\Document\VisiteVirtuelle $visiteVirtuelle
     */
    public function getVisiteVirtuelle()
    {
        return $this->visiteVirtuelle;
    }

    /**
     * Set visiteVirtuelle
     *
     * @param \GuideTouristiqueBundle\Document\VisiteVirtuelle $visiteVirtuelle
     * @return $this
     */
    public function setVisiteVirtuelle(\GuideTouristiqueBundle\Document\VisiteVirtuelle $visiteVirtuelle)
    {
        $this->visiteVirtuelle = $visiteVirtuelle;
        return $this;
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
}
