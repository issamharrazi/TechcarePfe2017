<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 17:10
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class ActualiteTraduction
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
     * @MongoDB\Field(type="string")
     */
    private $contenu;

    /**
     * @MongoDB\Field(type="string")
     */
    private $dateAjout;

    /**
     * @MongoDB\Field(type="string")
     */
    private $dateModification;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Langue")
     */
    private $langue;

    /**
     * ActualiteTraduction constructor.
     * @param $nom
     * @param $contenu
     * @param $langue
     */
    public function __construct($nom, $contenu, $langue, $dateAjout, $dateModification)
    {
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->langue = $langue;
        $this->dateAjout = $dateAjout;
        $this->dateModification = $dateModification;
    }

    /**
     * @return mixed
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }

    /**
     * @param mixed $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return mixed
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * @param mixed $dateModification
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * @param mixed $langue
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;
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


}
