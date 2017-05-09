<?php
/**
 * Created by PhpStorm.
 * User: fara7
 * Date: 08/02/2017
 * Time: 09:44
 */


namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;
    /**
     * @MongoDB\Field(type="integer")
     */
    protected $numTel;

    /**
     * @MongoDB\Field(type="collection")
     */
    protected $roles;
    /**
     * @MongoDB\ReferenceMany(targetDocument="Task", mappedBy="user")
     */
    protected $tasks = array();

    /**
     * User constructor.
     */


    /**
     * @return mixed
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param mixed $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
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
     * Get id
     *
     * @return id $id
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
