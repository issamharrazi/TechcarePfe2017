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
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Admin")
     */
    protected $chefequipe;

    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    protected $image;


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
     * @MongoDB\Field(type="string")
     */
    protected $nom;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\TypeClientVenteTraduction")
     */
    private $typetrad;
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
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
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
     */
    private $clientsvente = array();





    public function __construct()
    {
        parent::__construct();

        $this->clientsvente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->responsables = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientsachat = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get etattemporaire
     *
     * @return \GuideTouristiqueBundle\Document\Etat $etattemporaire
     */
    public function getEtattemporaire()
    {
        return $this->etattemporaire;
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
     * Get chefequipe
     *
     * @return \GuideTouristiqueBundle\Document\Admin $chefequipe
     */
    public function getChefequipe()
    {
        return $this->chefequipe;
    }

    /**
     * Set chefequipe
     *
     * @param \GuideTouristiqueBundle\Document\Admin $chefequipe
     * @return $this
     */
    public function setChefequipe(\GuideTouristiqueBundle\Document\Admin $chefequipe)
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
     * @param \GuideTouristiqueBundle\Document\Client $clientsachat
     */
    public function addClientsachat(\GuideTouristiqueBundle\Document\Client $clientsachat)
    {
        $this->clientsachat[] = $clientsachat;
    }

    /**
     * Remove clientsachat
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsachat
     */
    public function removeClientsachat(\GuideTouristiqueBundle\Document\Client $clientsachat)
    {
        $this->clientsachat->removeElement($clientsachat);
    }

    /**
     * Get clientsachat
     *
     * @return \Doctrine\Common\Collections\Collection $clientsachat
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
     * @param \GuideTouristiqueBundle\Document\Responsable $responsable
     */
    public function removeResponsable(\GuideTouristiqueBundle\Document\Responsable $responsable)
    {
        $this->responsables->removeElement($responsable);
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
     * Get nom
     *
     * @return string $nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return $this
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string $prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return $this
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Add clientsvente
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsvente
     */
    public function addClientsvente(\GuideTouristiqueBundle\Document\Client $clientsvente)
    {
        $this->clientsvente[] = $clientsvente;
    }

    /**
     * Remove clientsvente
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsvente
     */
    public function removeClientsvente(\GuideTouristiqueBundle\Document\Client $clientsvente)
    {
        $this->clientsvente->removeElement($clientsvente);
    }

    /**
     * Get clientsvente
     *
     * @return \Doctrine\Common\Collections\Collection $clientsvente
     */
    public function getClientsvente()
    {
        return $this->clientsvente;
    }
}
