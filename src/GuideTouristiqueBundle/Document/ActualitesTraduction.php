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
class ActualitesTraduction
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
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Langue")
     */
    private $langue;

    /**
     * ActualitesTraduction constructor.
     * @param $nom
     * @param $contenu
     * @param $langue
     */
    public function __construct($nom, $contenu, $langue)
    {
        $this->nom = $nom;
        $this->contenu = $contenu;
        $this->langue = $langue;
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
