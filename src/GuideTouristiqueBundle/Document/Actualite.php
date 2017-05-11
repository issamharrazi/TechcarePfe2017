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
class Actualite
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
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\ActualiteTraduction")
     */
    private $actualitestraduction;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Commentaire")
     */
    private $commentaires;


    public function __construct($datepublication, $etat)
    {
        $this->actualitestraduction = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datepublication = $datepublication;
        $this->etat = $etat;
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
     * Add actualitestraduction
     *
     * @param \GuideTouristiqueBundle\Document\ActualiteTraduction $actualitestraduction
     */
    public function addActualitestraduction(\GuideTouristiqueBundle\Document\ActualiteTraduction $actualitestraduction)
    {
        $this->actualitestraduction[] = $actualitestraduction;
    }

    /**
     * Remove actualitestraduction
     *
     * @param \GuideTouristiqueBundle\Document\ActualiteTraduction $actualitestraduction
     */
    public function removeActualitestraduction(\GuideTouristiqueBundle\Document\ActualiteTraduction $actualitestraduction)
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

    /**
     * Add commentaire
     *
     * @param \GuideTouristiqueBundle\Document\Commentaire $commentaire
     */
    public function addCommentaire(\GuideTouristiqueBundle\Document\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;
    }

    /**
     * Remove commentaire
     *
     * @param \GuideTouristiqueBundle\Document\Commentaire $commentaire
     */
    public function removeCommentaire(\GuideTouristiqueBundle\Document\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection $commentaires
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}
