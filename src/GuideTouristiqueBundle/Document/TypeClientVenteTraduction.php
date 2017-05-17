<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 15:33
 */

namespace GuideTouristiqueBundle\Document;


class TypeClientVenteTraduction
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $typeetablissement;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\TypeClientVente")
     */
    private $type;


    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Langue")
     */
    private $langue;

    /**
     * TypeClientVenteTraduction constructor.
     * @param $typeetablissement
     * @param $type
     * @param $langue
     */
    public function __construct($typeetablissement, $type, $langue)
    {
        $this->typeetablissement = $typeetablissement;
        $this->type = $type;
        $this->langue = $langue;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return mixed
     */
    public function getTypeetablissement()
    {
        return $this->typeetablissement;
    }

    /**
     * @param mixed $typeetablissement
     */
    public function setTypeetablissement($typeetablissement)
    {
        $this->typeetablissement = $typeetablissement;
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