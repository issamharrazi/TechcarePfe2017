<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 15:10
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class CpackPublicite
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="OffrePublicite")
     */
    private $offre;


    /**
     * @MongoDB\ReferenceOne(targetDocument="Categorie")
     */
    private $categorie;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Publicite")
     */
    private $publicite;


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
     * @return \GuideTouristiqueBundle\Document\OffrePublicite $offre
     */
    public function getOffre()
    {
        return $this->offre;
    }

    /**
     * Set offre
     *
     * @param \GuideTouristiqueBundle\Document\OffrePublicite $offre
     * @return self
     */
    public function setOffre(\GuideTouristiqueBundle\Document\OffrePublicite $offre)
    {
        $this->offre = $offre;
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
     * @return self
     */
    public function setCategorie(\GuideTouristiqueBundle\Document\Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    /**
     * Get publicite
     *
     * @return \GuideTouristiqueBundle\Document\Publicite $publicite
     */
    public function getPublicite()
    {
        return $this->publicite;
    }

    /**
     * Set publicite
     *
     * @param \GuideTouristiqueBundle\Document\Publicite $publicite
     * @return self
     */
    public function setPublicite(\GuideTouristiqueBundle\Document\Publicite $publicite)
    {
        $this->publicite = $publicite;
        return $this;
    }
}
