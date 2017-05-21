<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 16:12
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class ChefEquipe extends Admin
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
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $tachesaffectees = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Agent")
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
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Agent")
     */
    private $agentstemporaires = array();
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\Tache")
     */
    private $tachesaffecteestemporaires = array();

    public function __construct()
    {
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
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
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
     * Add agent
     *
     * @param \GuideTouristiqueBundle\Document\Agent $agent
     */
    public function addAgent(\GuideTouristiqueBundle\Document\Agent $agent)
    {
        $this->agents[] = $agent;
    }

    /**
     * Remove agent
     *
     * @param \GuideTouristiqueBundle\Document\Agent $agent
     */
    public function removeAgent(\GuideTouristiqueBundle\Document\Agent $agent)
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
     * @param \GuideTouristiqueBundle\Document\Agent $agentstemporaire
     */
    public function addAgentstemporaire(\GuideTouristiqueBundle\Document\Agent $agentstemporaire)
    {
        $this->agentstemporaires[] = $agentstemporaire;
    }

    /**
     * Remove agentstemporaire
     *
     * @param \GuideTouristiqueBundle\Document\Agent $agentstemporaire
     */
    public function removeAgentstemporaire(\GuideTouristiqueBundle\Document\Agent $agentstemporaire)
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
}
