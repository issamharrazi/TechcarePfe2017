<?php
/**
 * Created by PhpStorm.
 * User: fara7
 * Date: 08/02/2017
 * Time: 09:44
 */


namespace GuideTouristiqueBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;
    /**
     * @MongoDB\Field(type="integer")
     */
    protected $numTel;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $roles;
    /**
     * @MongoDB\ReferenceMany(targetDocument="Tache", mappedBy="user")
     */
    protected $taches = array();

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
     * Get numTel
     *
     * @return integer $numTel
     */
    public function getNumTel()
    {
        return $this->numTel;
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
     * Add tach
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tach
     */
    public function addTach(\GuideTouristiqueBundle\Document\Tache $tach)
    {
        $this->taches[] = $tach;
    }

    /**
     * Remove tach
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tach
     */
    public function removeTach(\GuideTouristiqueBundle\Document\Tache $tache)
    {
        $this->taches->removeElement($tache);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection $taches
     */
    public function getTaches()
    {
        return $this->taches;
    }
}
