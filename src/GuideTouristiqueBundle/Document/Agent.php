<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 16:30
 */

namespace GuideTouristiqueBundle\Document;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Agent
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\ChefEquipe")
     */
    protected $chefequipe;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etat;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etattemporaire;
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $tachesaffectees = array();

    public function __construct()
    {
        $this->tachesaffectees = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add tachesaffectee
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffectee
     */
    public function addTachesaffectee(\GuideTouristiqueBundle\Document\Tache $tachesaffectee)
    {
        $this->tachesaffectees[] = $tachesaffectee;
    }

    /**
     * Remove tachesaffectee
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffectee
     */
    public function removeTachesaffectee(\GuideTouristiqueBundle\Document\Tache $tachesaffectee)
    {
        $this->tachesaffectees->removeElement($tachesaffectee);
    }

    /**
     * Get tachesaffectees
     *
     * @return \Doctrine\Common\Collections\Collection $tachesaffectees
     */
    public function getTachesaffectees()
    {
        return $this->tachesaffectees;
    }

    /**
     * Get chefequipe
     *
     * @return \GuideTouristiqueBundle\Document\ChefEquipe $chefequipe
     */
    public function getChefequipe()
    {
        return $this->chefequipe;
    }

    /**
     * Set chefequipe
     *
     * @param \GuideTouristiqueBundle\Document\ChefEquipe $chefequipe
     * @return $this
     */
    public function setChefequipe(\GuideTouristiqueBundle\Document\ChefEquipe $chefequipe)
    {
        $this->chefequipe = $chefequipe;
        return $this;
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
     * Get etattemporaire
     *
     * @return \GuideTouristiqueBundle\Document\Etat $etattemporaire
     */
    public function getEtattemporaire()
    {
        return $this->etattemporaire;
    }

    /**
     * Set etattemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etattemporaire
     * @return $this
     */
    public function setEtattemporaire(\GuideTouristiqueBundle\Document\Etat $etattemporaire)
    {
        $this->etattemporaire = $etattemporaire;
        return $this;
    }
}
