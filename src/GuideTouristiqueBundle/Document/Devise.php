<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 21:34
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Devise
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
    private $code;

    /**
     * @MongoDB\Field(type="string")
     */
    private $codeHtml;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * Devise constructor.
 * @param $code
     * @param $codeHtml
     */
    public function __construct($nom, $code, $codeHtml, $etat)
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->codeHtml = $codeHtml;
        $this->etat = $etat;
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
     *
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCodeHtml()
    {
        return $this->codeHtml;
    }

    /**
     * @param mixed $codeHtml
     */
    public function setCodeHtml($codeHtml)
    {
        $this->codeHtml = $codeHtml;
    }


}
