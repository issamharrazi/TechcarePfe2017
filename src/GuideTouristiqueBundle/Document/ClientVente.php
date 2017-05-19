<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 15:23
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class ClientVente extends Client
{

    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $nometablissement;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $numtel;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $fax;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $nombrevisite;


    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\TypeClientVenteTraduction")
     */
    private $typetrad;

    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\ClientAchat")
     */
    private $clientsachat = array();

    /**
     * @MongoDB\EmbedMany(targetDocument="GuideTouristiqueBundle\Document\Responsable")
     */
    private $responsables = array();

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Adresse")
     */
    private $adresse;

    public function __construct()
    {
        parent::__construct();
        $this->responsables = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientsachat = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Get nometablissement
     *
     * @return string $nometablissement
     */
    public function getNometablissement()
    {
        return $this->nometablissement;
    }

    /**
     * Set nometablissement
     *
     * @param string $nometablissement
     * @return $this
     */
    public function setNometablissement($nometablissement)
    {
        $this->nometablissement = $nometablissement;
        return $this;
    }

    /**
     * Get numtel
     *
     * @return int $numtel
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * Set numtel
     *
     * @param int $numtel
     * @return $this
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;
        return $this;
    }



    /**
     * Get fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * Get nombrevisite
     *
     * @return int $nombrevisite
     */
    public function getNombrevisite()
    {
        return $this->nombrevisite;
    }

    /**
     * Set nombrevisite
     *
     * @param int $nombrevisite
     * @return $this
     */
    public function setNombrevisite($nombrevisite)
    {
        $this->nombrevisite = $nombrevisite;
        return $this;
    }

    /**
     * Get typetrad
     *
     * @return \GuideTouristiqueBundle\Document\TypeClientVenteTraduction $typetrad
     */
    public function getTypetrad()
    {
        return $this->typetrad;
    }

    /**
     * Set typetrad
     *
     * @param \GuideTouristiqueBundle\Document\TypeClientVenteTraduction $typetrad
     * @return $this
     */
    public function setTypetrad(\GuideTouristiqueBundle\Document\TypeClientVenteTraduction $typetrad)
    {
        $this->typetrad = $typetrad;
        return $this;
    }

    /**
     * Add clientsachat
     *
     * @param \GuideTouristiqueBundle\Document\ClientAchat $clientsachat
     */
    public function addClientsachat(\GuideTouristiqueBundle\Document\ClientAchat $clientsachat)
    {
        $this->clientsachat[] = $clientsachat;
    }

    /**
     *
     */
    public function removeClientsachat(\GuideTouristiqueBundle\Document\ClientAchat $clientsachat)
    {
        $this->clientsachat->removeElement($clientsachat);
    }

    /**
     * Get clientsachat
     *
     */
    public function getClientsachat()
    {
        return $this->clientsachat;
    }

    /**
     * Add responsable
     *
     * @param \GuideTouristiqueBundle\Document\Responsable $responsable
     */
    public function addResponsable(\GuideTouristiqueBundle\Document\Responsable $responsable)
    {
        $this->responsables[] = $responsable;
    }

    /**
     * Remove responsable
     *
     */
    public function removeResponsable(\GuideTouristiqueBundle\Document\Responsable $responsable)
    {
        $this->responsables->removeElement($responsable);
    }

    /**
     * clear responsable
     *
     */
    public function clearResponsable()
    {
        $this->responsables->clear();
    }


    /**
     * Get responsables
     *
     * @return \Doctrine\Common\Collections\Collection $responsables
     */
    public function getResponsables()
    {
        return $this->responsables;
    }

    /**
     * Get adresse
     *
     * @return \GuideTouristiqueBundle\Document\Adresse $adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set adresse
     *
     * @param \GuideTouristiqueBundle\Document\Adresse $adresse
     * @return $this
     */
    public function setAdresse(\GuideTouristiqueBundle\Document\Adresse $adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Set etat
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etat
     * @return $this
     */
    public function setEtat(\GuideTouristiqueBundle\Document\Etat $etat)
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * Get etat
     *
     * @return \GuideTouristiqueBundle\Document\Etat $etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set etattemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Etat $etattemporaire
     * @return $this
     */
    public function setEtattemporaire(\GuideTouristiqueBundle\Document\Etat $etattemporaire)
    {
        $this->etattemporaire = $etattemporaire;
        return $this;
    }

    /**
     * Get etattemporaire
     *
     * @return \GuideTouristiqueBundle\Document\Etat $etattemporaire
     */
    public function getEtattemporaire()
    {
        return $this->etattemporaire;
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
     * Get chefequipe
     *
     * @return \GuideTouristiqueBundle\Document\ChefEquipe $chefequipe
     */
    public function getChefequipe()
    {
        return $this->chefequipe;
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

    /**
     * Get image
     *
     * @return \GuideTouristiqueBundle\Document\Image $image
     */
    public function getImage()
    {
        return $this->image;
    }
}
