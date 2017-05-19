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
class Client extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etat;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etattemporaire;


    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\ChefEquipe")
     */
    protected $chefequipe;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    protected $image;

    /**
     * Get etat
     *
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set etat
     *
     * @return $this
     */
    public function setEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * Get etattemporaire
     *
     */
    public function getEtattemporaire()
    {
        return $this->etattemporaire;
    }

    /**
     * Set etattemporaire
     *
     * @return $this
     */
    public function setEtattemporaire(\GuideTouristiqueBundle\Document\Etat $etattemporaire)
    {
        $this->etattemporaire = $etattemporaire;
        return $this;
    }

    /**
     * Get chefequipe
     *
     * @return \GuideTouristiqueBundle\Document\ChefEquipe $chefequipe
     */
    public function getChefequipe()
    {
        return $this->chefequipe;
    }

    /**
     * Set chefequipe
     *
     * @param \GuideTouristiqueBundle\Document\ChefEquipe $chefequipe
     * @return $this
     */
    public function setChefequipe(\GuideTouristiqueBundle\Document\ChefEquipe $chefequipe)
    {
        $this->chefequipe = $chefequipe;
        return $this;
    }

    /**
     * Get image
     *
     * @return \GuideTouristiqueBundle\Document\Image $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param \GuideTouristiqueBundle\Document\Image $image
     * @return $this
     */
    public function setImage(\GuideTouristiqueBundle\Document\Image $image)
    {
        $this->image = $image;
        return $this;
    }
}
