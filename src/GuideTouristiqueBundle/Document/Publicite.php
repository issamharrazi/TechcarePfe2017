<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 13:33
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Publicite
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="TypePublicite")
     */
    private $type;


    /**
     * @MongoDB\ReferenceMany(targetDocument="Image")
     */
    private $images = array();


    public function __construct($type)
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
        $this->type = $type;
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

    /**
     * Get type
     *
     * @return \GuideTouristiqueBundle\Document\TypePublicite $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param \GuideTouristiqueBundle\Document\TypePublicite $type
     * @return self
     */
    public function setType(\GuideTouristiqueBundle\Document\TypePublicite $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Add image
     *
     * @param \GuideTouristiqueBundle\Document\Image $image
     */
    public function addImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->images[] = $image;
    }

    /**
     * Remove image
     *
     * @param `\GuideTouristiqueBundle\Document\Image $image
     */
    public function removeImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection $images
     */
    public function getImages()
    {
        return $this->images;
    }
}
