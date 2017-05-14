<?php
/**
 * Created by PhpStorm.
 * User: fara7
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
     * @MongoDB\ReferenceOne(targetDocument="User", inversedBy="Tache")
     */
    private $user;

    /**
     * Tache constructor.
     * @param $description
     * @param $etat
     * @param $user
     */
    public function __construct($nom, $description, $etat, $user)
    {
        $this->description = $description;
        $this->etat = $etat;
        $this->user = $user;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
