<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 15:12
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Adresse
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nomrue;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $numrue;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $ville;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $pays;

    /**
     * Adresse constructor.
     * @param $nomrue
     * @param $numrue
     * @param $ville
     * @param $pays
     */
    public function __construct($nomrue, $numrue, $ville, $pays)
    {
        $this->nomrue = $nomrue;
        $this->numrue = $numrue;
        $this->ville = $ville;
        $this->pays = $pays;
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
    public function getNomrue()
    {
        return $this->nomrue;
    }

    /**
     * @param mixed $nomrue
     */
    public function setNomrue($nomrue)
    {
        $this->nomrue = $nomrue;
    }

    /**
     * @return mixed
     */
    public function getNumrue()
    {
        return $this->numrue;
    }

    /**
     * @param mixed $numrue
     */
    public function setNumrue($numrue)
    {
        $this->numrue = $numrue;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }


}
