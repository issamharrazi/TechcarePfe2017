<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 17:16
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Actualites
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datepublication;

    /**
     * @MongoDB\Field(type="string")
     */
    private $dateajout;

    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\ActualitesTraduction")
     */
    private $actualitestraduction;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;


    public function __construct()
    {
        $this->actualitestraduction = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get datepublication
     *
     * @return string $datepublication
     */
    public function getDatepublication()
    {
        return $this->datepublication;
    }

    /**
     * Set datepublication
     *
     * @param string $datepublication
     * @return $this
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;
        return $this;
    }

    /**
     * Get dateajout
     *
     * @return string $dateajout
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * Set dateajout
     *
     * @param string $dateajout
     * @return $this
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;
        return $this;
    }

    /**
     * Add actualitestraduction
     *
     * @param \GuideTouristiqueBundle\Document\ActualitesTraduction $actualitestraduction
     */
    public function addActualitestraduction(\GuideTouristiqueBundle\Document\ActualitesTraduction $actualitestraduction)
    {
        $this->actualitestraduction[] = $actualitestraduction;
    }

    /**
     * Remove actualitestraduction
     *
     * @param \GuideTouristiqueBundle\Document\ActualitesTraduction $actualitestraduction
     */
    public function removeActualitestraduction(\GuideTouristiqueBundle\Document\ActualitesTraduction $actualitestraduction)
    {
        $this->actualitestraduction->removeElement($actualitestraduction);
    }

    /**
     * Get actualitestraduction
     *
     * @return \Doctrine\Common\Collections\Collection $actualitestraduction
     */
    public function getActualitestraduction()
    {
        return $this->actualitestraduction;
    }

    /**
     * Get etat
     *
     * @return \GuideTouristiqueBundle\Document\Etat $etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set etat
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etat
     * @return $this
     */
    public function setEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat = $etat;
        return $this;
    }
}
