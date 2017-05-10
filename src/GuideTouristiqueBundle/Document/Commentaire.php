<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:20
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Commentaire
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;
    /**
     * @MongoDB\Field(type="string")
     */
    private $contenu;

    /**
     * @MongoDB\Field(type="string")
     */
    private $dateajout;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * Commentaire constructor.
     * @param $contenu
     * @param $dateajout
     */
    public function __construct($contenu, $dateajout, $etat)
    {
        $this->contenu = $contenu;
        $this->dateajout = $dateajout;
        $this->etat = $etat;

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
    public function getDateajout()
    {
        return $this->dateajout;
    }

    /**
     * @param mixed $dateajout
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;
    }


}
