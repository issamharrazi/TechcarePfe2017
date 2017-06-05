<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 16/05/2017
 * Time: 15:02
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @MongoDB\Document
 */
class Admin extends BaseUser
{

    /**
     * @MongoDB\Id(strategy="increment")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $sexe;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $aboutme;
    /**
     * @MongoDB\Field(name="skills", type="collection")
     */
    protected $skills;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $numtel;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Admin")
     */
    protected $chefequipe;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etat;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Etat")
     */
    protected $etattemporaire;
    /**
     * @MongoDB\ReferenceOne(targetDocument="GuideTouristiqueBundle\Document\Adresse")
     */
    private $adresse;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    private $image;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Image")
     */
    private $imageCover;
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $tachesaffectees = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
     */
    private $clientsachat = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
     */
    private $clientsvente = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $taches = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Admin")
     */
    private $agents = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
     */
    private $clientsachattemporaires = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Client")
     */
    private $clientsventetemporaires = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Admin")
     */
    private $agentstemporaires = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $tachesaffecteestemporaires = array();

    public function __construct()
    {
        parent::__construct();
        $this->clientsachat = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientsvente = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tachesaffectees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->agents = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientsachattemporaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->clientsventetemporaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->agentstemporaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tachesaffecteestemporaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
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
     * Add skills
     *
     * @param
     */
    public function addSkills($skill)
    {
        $this->skills[] = $skill;
    }

    /**
     * Remove tachesaffectee
     *
     * @param \skills
     */
    public function removeSkills($skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get tachesaffectees
     *
     * @return \Doctrine\Common\Collections\Collection $tachesaffectees
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set skills
     *
     * @param collection $skills
     * @return $this
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAboutme()
    {
        return $this->aboutme;
    }

    /**
     * @param mixed $aboutMe
     */
    public function setAboutme($aboutme)
    {
        $this->aboutme = $aboutme;
    }

    /**
     * @return mixed
     */
    public function getImageCover()
    {
        return $this->imageCover;
    }

    /**
     * @param mixed $imageCover
     */
    public function setImageCover($imageCover)
    {
        $this->imageCover = $imageCover;
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
     * Get numTel
     *
     * @return integer $numTel
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * Set numTel
     *
     * @param integer $numTel
     * @return $this
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;
        return $this;
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
     * Add tachesaffectee
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffectee
     */
    public function addTachesaffectee(\GuideTouristiqueBundle\Document\Tache $tachesaffectee)
    {
        $this->tachesaffectees[] = $tachesaffectee;
    }

    /**
     * Remove tachesaffectee
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffectee
     */
    public function removeTachesaffectee(\GuideTouristiqueBundle\Document\Tache $tachesaffectee)
    {
        $this->tachesaffectees->removeElement($tachesaffectee);
    }

    /**
     * Get tachesaffectees
     *
     * @return \Doctrine\Common\Collections\Collection $tachesaffectees
     */
    public function getTachesaffectees()
    {
        return $this->tachesaffectees;
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

    /**
     * Add tach
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tach
     */
    public function addTach(\GuideTouristiqueBundle\Document\Tache $tach)
    {
        $this->taches[] = $tach;
    }

    /**
     * Remove tach
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tach
     */
    public function removeTach(\GuideTouristiqueBundle\Document\Tache $tach)
    {
        $this->taches->removeElement($tach);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection $taches
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * Add agent
     *
     * @param \GuideTouristiqueBundle\Document\Admin $agent
     */
    public function addAgent(\GuideTouristiqueBundle\Document\Admin $agent)
    {
        $this->agents[] = $agent;
    }

    /**
     * Remove agent
     *
     * @param \GuideTouristiqueBundle\Document\Admin $agent
     */
    public function removeAgent(\GuideTouristiqueBundle\Document\Admin $agent)
    {
        $this->agents->removeElement($agent);
    }

    /**
     * Get agents
     *
     * @return \Doctrine\Common\Collections\Collection $agents
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * Add clientsachattemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsachattemporaire
     */
    public function addClientsachattemporaire(\GuideTouristiqueBundle\Document\Client $clientsachattemporaire)
    {
        $this->clientsachattemporaires[] = $clientsachattemporaire;
    }

    /**
     * Remove clientsachattemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsachattemporaire
     */
    public function removeClientsachattemporaire(\GuideTouristiqueBundle\Document\Client $clientsachattemporaire)
    {
        $this->clientsachattemporaires->removeElement($clientsachattemporaire);
    }

    /**
     * Get clientsachattemporaires
     *
     * @return \Doctrine\Common\Collections\Collection $clientsachattemporaires
     */
    public function getClientsachattemporaires()
    {
        return $this->clientsachattemporaires;
    }

    /**
     * Add clientsventetemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsventetemporaire
     */
    public function addClientsventetemporaire(\GuideTouristiqueBundle\Document\Client $clientsventetemporaire)
    {
        $this->clientsventetemporaires[] = $clientsventetemporaire;
    }

    /**
     * Remove clientsventetemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Client $clientsventetemporaire
     */
    public function removeClientsventetemporaire(\GuideTouristiqueBundle\Document\Client $clientsventetemporaire)
    {
        $this->clientsventetemporaires->removeElement($clientsventetemporaire);
    }

    /**
     * Get clientsventetemporaires
     *
     * @return \Doctrine\Common\Collections\Collection $clientsventetemporaires
     */
    public function getClientsventetemporaires()
    {
        return $this->clientsventetemporaires;
    }

    /**
     * Add agentstemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Admin $agentstemporaire
     */
    public function addAgentstemporaire(\GuideTouristiqueBundle\Document\Admin $agentstemporaire)
    {
        $this->agentstemporaires[] = $agentstemporaire;
    }

    /**
     * Remove agentstemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Admin $agentstemporaire
     */
    public function removeAgentstemporaire(\GuideTouristiqueBundle\Document\Admin $agentstemporaire)
    {
        $this->agentstemporaires->removeElement($agentstemporaire);
    }

    /**
     * Get agentstemporaires
     *
     * @return \Doctrine\Common\Collections\Collection $agentstemporaires
     */
    public function getAgentstemporaires()
    {
        return $this->agentstemporaires;
    }

    /**
     * Add tachesaffecteestemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffecteestemporaire
     */
    public function addTachesaffecteestemporaire(\GuideTouristiqueBundle\Document\Tache $tachesaffecteestemporaire)
    {
        $this->tachesaffecteestemporaires[] = $tachesaffecteestemporaire;
    }

    /**
     * Remove tachesaffecteestemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Tache $tachesaffecteestemporaire
     */
    public function removeTachesaffecteestemporaire(\GuideTouristiqueBundle\Document\Tache $tachesaffecteestemporaire)
    {
        $this->tachesaffecteestemporaires->removeElement($tachesaffecteestemporaire);
    }

    /**
     * Get tachesaffecteestemporaires
     *
     * @return \Doctrine\Common\Collections\Collection $tachesaffecteestemporaires
     */
    public function getTachesaffecteestemporaires()
    {
        return $this->tachesaffecteestemporaires;
    }
}
