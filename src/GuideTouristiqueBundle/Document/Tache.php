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
    private $admin;

    /**
     * Tache constructor.
     * @param $description
     * @param $etat
     */
    public function __construct($nom, $description, $etat, $admin)
    {
        $this->description = $description;
        $this->etat = $etat;
        $this->admin = $admin;
        $this->nom = $nom;
    }

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
    public function getAdmin()
    {
        return $this->admin;
    }


    public function setAdmin($admin)
    {
        $this->admin = $admin;
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
     * Task constructor.
     */



}
