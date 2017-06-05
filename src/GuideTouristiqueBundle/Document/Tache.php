<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/04/2017
 * Time: 01:32
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Tache
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $description;
    /**
     * @MongoDB\ReferenceOne(targetDocument="Etat")
     */
    protected $etat;
    /**
     * @MongoDB\ReferenceOne(targetDocument="Admin")
     */
    private $chefequipe;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Admin")
     */
    private $agent;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datedebut;

    /**
     * @MongoDB\Field(type="string")
     */
    private $datefin;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Etat")
     */
    private $etattemporaire;


    /**
     * @MongoDB\ReferenceOne(targetDocument="Fichier")
     */
    private $fichierelie;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Fichier")
     */
    private $tacherealise;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getChefequipe()
    {
        return $this->chefequipe;
    }

    /**
     * @param mixed $chefequipe
     */
    public function setChefequipe($chefequipe)
    {
        $this->chefequipe = $chefequipe;
    }

    /**
     * @return mixed
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @param mixed $agent
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

    /**
     * @return mixed
     */
    public function getEtattemporaire()
    {
        return $this->etattemporaire;
    }

    /**
     * @param mixed $etattemporaire
     */
    public function setEtattemporaire($etattemporaire)
    {
        $this->etattemporaire = $etattemporaire;
    }


    /**
     * @return mixed
     */
    public function getFichierelie()
    {
        return $this->fichierelie;
    }

    /**
     * @param mixed $fichierelie
     */
    public function setFichierelie($fichierelie)
    {
        $this->fichierelie = $fichierelie;
    }

    /**
     * @return mixed
     */
    public function getTacherealise()
    {
        return $this->tacherealise;
    }

    /**
     * @param mixed $tacherealise
     */
    public function setTacherealise($tacherealise)
    {
        $this->tacherealise = $tacherealise;
    }


}
