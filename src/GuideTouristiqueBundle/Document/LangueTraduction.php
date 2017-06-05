<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 24/05/2017
 * Time: 23:13
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class LangueTraduction
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $nom;


    /**
     * @MongoDB\ReferenceOne(targetDocument="Langue")
     */
    private $langue;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Langue")
     */
    private $langueref;

    /**
     * LangueTraduction constructor.
     * @param $nom
     * @param $langue
     * @param $langueref
     */
    public function __construct($nom, Langue $langue, Langue $langueref)
    {
        $this->nom = $nom;
        $this->langue = $langue;
        $this->langueref = $langueref;
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
     * Get langue
     *
     * @return \GuideTouristiqueBundle\Document\Langue $langue
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set langue
     *
     * @param \GuideTouristiqueBundle\Document\Langue $langue
     * @return $this
     */
    public function setLangue(\GuideTouristiqueBundle\Document\Langue $langue)
    {
        $this->langue = $langue;
        return $this;
    }

    /**
     * Get langueref
     *
     * @return \GuideTouristiqueBundle\Document\Langue $langueref
     */
    public function getLangueref()
    {
        return $this->langueref;
    }

    /**
     * Set langueref
     *
     * @param \GuideTouristiqueBundle\Document\Langue $langueref
     * @return $this
     */
    public function setLangueref(\GuideTouristiqueBundle\Document\Langue $langueref)
    {
        $this->langueref = $langueref;
        return $this;
    }
}
