<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 12/04/2017
 * Time: 10:15
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\document
 */
class Pack
{
    /**
     * @MongoDB\Id(strategy="increment")
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\CpackFicheTechnique")
     */
    private $cpackFicheTchnique;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\CpackImage")
     */
    private $cpackImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\CpackVideo")
     */
    private $cpackVideo;

    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\CpackPublicite")
     */
    private $cpackPublicite;


    /**
     * Pack constructor.
     * @param $cpackFicheTchnique
     */


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
     * Get cpackFicheTchnique
     *
     */
    public function getCpackFicheTchnique()
    {
        return $this->cpackFicheTchnique;
    }

    /**
     * Set cpackFicheTchnique
     *
     * @return $this
     */
    public function setCpackFicheTchnique(\GuideTouristiqueBundle\Document\CpackFicheTechnique $cpackFicheTchnique)
    {
        $this->cpackFicheTchnique = $cpackFicheTchnique;
        return $this;
    }

    /**
     * Get cpackImage
     *
     * @return \GuideTouristiqueBundle\Document\CpackImage $cpackImage
     */
    public function getCpackImage()
    {
        return $this->cpackImage;
    }

    /**
     * Set cpackImage
     *
     * @param \GuideTouristiqueBundle\Document\CpackImage $cpackImage
     * @return self
     */
    public function setCpackImage(\GuideTouristiqueBundle\Document\CpackImage $cpackImage)
    {
        $this->cpackImage = $cpackImage;
        return $this;
    }

    /**
     * Get cpackVideo
     *
     * @return GuideTouristiqueBundle\Document\CpackVideo $cpackVideo
     */
    public function getCpackVideo()
    {
        return $this->cpackVideo;
    }

    /**
     * Set cpackVideo
     *
     * @param GuideTouristiqueBundle\Document\CpackVideo $cpackVideo
     * @return self
     */
    public function setCpackVideo(\GuideTouristiqueBundle\Document\CpackVideo $cpackVideo)
    {
        $this->cpackVideo = $cpackVideo;
        return $this;
    }

    /**
     * Get cpackPublicite
     *
     * @return GuideTouristiqueBundle\Document\CpackPublicite $cpackPublicite
     */
    public function getCpackPublicite()
    {
        return $this->cpackPublicite;
    }

    /**
     * Set cpackPublicite
     *
     * @param GuideTouristiqueBundle\Document\CpackPublicite $cpackPublicite
     * @return self
     */
    public function setCpackPublicite(\GuideTouristiqueBundle\Document\CpackPublicite $cpackPublicite)
    {
        $this->cpackPublicite = $cpackPublicite;
        return $this;
    }
}
