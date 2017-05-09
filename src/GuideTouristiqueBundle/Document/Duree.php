<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 16:37
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Duree
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;
    /**
     * @MongoDB\Field(type="int")
     */
    protected $jour;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $mois;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $annee;

    /**
     * Duree constructor.
     * @param $jour
     * @param $mois
     * @param $annee
     */
    public function __construct($jour, $mois, $annee)
    {
        $this->jour = $jour;
        $this->mois = $mois;
        $this->annee = $annee;
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
     * Get jour
     *
     * @return string $jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set jour
     *
     * @param string $jour
     * @return self
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
        return $this;
    }

    /**
     * Get mois
     *
     * @return string $mois
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set mois
     *
     * @param string $mois
     * @return self
     */
    public function setMois($mois)
    {
        $this->mois = $mois;
        return $this;
    }

    /**
     * Get annee
     *
     * @return string $annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set annee
     *
     * @param string $annee
     * @return self
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
        return $this;
    }
}
