<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 17/05/2017
 * Time: 15:40
 */

namespace GuideTouristiqueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class ClientAchat
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
    /**
     * @MongoDB\Field(type="int")
     */
    protected $numtel;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $mail;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $nom;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $prenom;
    /**
     * @MongoDB\EmbedOne(targetDocument="GuideTouristiqueBundle\Document\Adresse")
     */
    private $adresse;
    /**
     * @MongoDB\ReferenceMany(targetDocument="GuideTouristiqueBundle\Document\ClientVente")
     */
    private $clientsvente = array();


    public function __construct()
    {
        $this->clientsvente = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get mail
     *
     * @return string $mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return $this
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
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
     * @param \GuideTouristiqueBundle\Document\ClientVente $clientsvente
     */
    public function addClientsvente(\GuideTouristiqueBundle\Document\ClientVente $clientsvente)
    {
        $this->clientsvente[] = $clientsvente;
    }

    /**
     * Remove clientsvente
     *
     * @param \GuideTouristiqueBundle\Document\ClientVente $clientsvente
     */
    public function removeClientsvente(\GuideTouristiqueBundle\Document\ClientVente $clientsvente)
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
