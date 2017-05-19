<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/04/2017
 * Time: 21:02
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Responsable
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;

    /**
     * @MongoDB\Field(type="integer")
     */
    protected $numtel;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $email;



    /**
     * Responsable constructor.
     * @param $nom
     * @param $prenom
     * @param $numTel
     * @param $email
     * @param $fax
     */
    public function __construct($nom, $prenom, $numtel, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numtel = $numtel;
        $this->email = $email;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNumTel()
    {
        return $this->numtel;
    }

    /**
     * @param mixed $numTel
     */
    public function setNumTel($numtel)
    {
        $this->numtel = $numtel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}
