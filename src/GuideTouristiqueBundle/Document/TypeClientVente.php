<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 15:15
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class TypeClientVente
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    private $etat;

    /**
     * TypeClientVente constructor.
     * @param $etat
     */
    public function __construct($etat)
    {
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


}
