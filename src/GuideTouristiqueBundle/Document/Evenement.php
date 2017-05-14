<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 18:24
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Evenement
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
    private $datedebutevenement;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datefinevenement;


    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\EvenementTraduction")
     */
    private $evenementtraduction;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Commentaire")
     */
    private $commentaires;


    public function __construct()
    {
        $this->evenementtraduction = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get datedebutevenement
     *
     * @return string $datedebutevenement
     */
    public function getDatedebutevenement()
    {
        return $this->datedebutevenement;
    }

    /**
     * Set datedebutevenement
     *
     * @param string $datedebutevenement
     * @return $this
     */
    public function setDatedebutevenement($datedebutevenement)
    {
        $this->datedebutevenement = $datedebutevenement;
        return $this;
    }

    /**
     * Get datefinevenement
     *
     * @return string $datefinevenement
     */
    public function getDatefinevenement()
    {
        return $this->datefinevenement;
    }

    /**
     * Set datefinevenement
     *
     * @param string $datefinevenement
     * @return $this
     */
    public function setDatefinevenement($datefinevenement)
    {
        $this->datefinevenement = $datefinevenement;
        return $this;
    }

    /**
     * Add evenementtraduction
     *
     * @param \GuideTouristiqueBundle\Document\EvenementTraduction $evenementtraduction
     */
    public function addEvenementtraduction(\GuideTouristiqueBundle\Document\EvenementTraduction $evenementtraduction)
    {
        $this->evenementtraduction[] = $evenementtraduction;
    }

    /**
     * Remove evenementtraduction
     *
     * @param \GuideTouristiqueBundle\Document\EvenementTraduction $evenementtraduction
     */
    public function removeEvenementtraduction(\GuideTouristiqueBundle\Document\EvenementTraduction $evenementtraduction)
    {
        $this->evenementtraduction->removeElement($evenementtraduction);
    }

    /**
     * Get evenementtraduction
     *
     * @return \Doctrine\Common\Collections\Collection $evenementtraduction
     */
    public function getEvenementtraduction()
    {
        return $this->evenementtraduction;
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
