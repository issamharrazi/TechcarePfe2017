<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/04/2017
 * Time: 16:37
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class test
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;


    public function __construct()
    {
        $this->etat = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add etat
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etat
     */
    public function addEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat[] = $etat;
    }

    /**
     * Remove etat
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etat
     */
    public function removeEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat->removeElement($etat);
    }

    /**
     * Get etat
     *
     * @return \Doctrine\Common\Collections\Collection $etat
     */
    public function getEtat()
    {
        return $this->etat;
    }
}
