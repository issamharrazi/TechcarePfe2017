<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 14:28
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ClientAchatIMetier;

class ClientAchatImpMetier implements ClientAchatIMetier
{

    const CLASSNAMECLIENTAchat = 'Client';
    protected static $idaoImpClientAchat;
    protected static $etatImpMetier;
    protected static $adresseImpMetier;
    protected static $imageImpMetier;
    protected static $clientImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientAchatIdao $idaoImpClientAchat, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier $adresseImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpClientAchat = $idaoImpClientAchat;


        self::$etatImpMetier = $etatImpMetier;
        self::$imageImpMetier = $imageImpMetier;
        //   self::$clientImpMetier = $clientImpMetier;
        self::$adresseImpMetier = $adresseImpMetier;


    }


    public function addClientAchat($data)
    {
        // TODO: Implement addClientAchat() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        if (!(self::$idaoImpClientAchat->FindByMail($data['email'], self::CLASSNAMECLIENTAchat))) {
            $ClientAchat = self::$idaoImpClientAchat->RegisterClientAchat($data);
            return $ClientAchat;

        } else
            return null;


    }

    public function addClientVenteAuClientAchat($clientVente, $clientAchat)
    {
        // TODO: Implement addClientVenteAuClientAchat() method.
        $ClientAchat = self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $clientAchat->getId());
        return self::$idaoImpClientAchat->addClientVenteAuClientAchat($clientVente, $ClientAchat);

    }

    public function DesactiveClientAchatTemporairement($clientVente, $data)
    {
        // TODO: Implement DesactiveClientAchatTemporairement() method.
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum(2);
        $ClientAchat = self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $data['id']);
        return self::$idaoImpClientAchat->DesactiveClientAchatTemporairement($ClientAchat, $data);

    }

    public function UpdateChefEquipeClientAchat($data, $chefEquipe)
    {
        // TODO: Implement UpdateChefEquipeClientAchat() method.
        //  $data['typetrad'] = self::$typeTradImpMetier->getClientVenteType($data['typetrad']['id']);


        $ClientAchat = self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $data['id']);
        return self::$idaoImpClientAchat->UpdateChefEquipeClientAchat($ClientAchat, $data);

    }

    public function updateClientAchat($data)
    {
        // TODO: Implement updateClientAchat() method.
        //etat
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);


        $data['adresse'] = self::$adresseImpMetier->updateAdresse($data['adresse']);


        $data['image'] = self::$imageImpMetier->updateImage($data['image']);


        $ClientAchat = self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $data['id']);
        return self::$idaoImpClientAchat->UpdateClientAchat($ClientAchat, $data);


    }

    public function deleteClientAchat($id)
    {
        // TODO: Implement deleteClientAchat() method.
        $ClientAchat = self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $id);
        self::$adresseImpMetier->deleteAdresse($ClientAchat->getAdresse()->getId());
        self::$imageImpMetier->deleteImage($ClientAchat->getImage()->getId());


        self::$idaoImpClientAchat->delete($ClientAchat);

    }

    public function getAllClientsAchat()
    {
        // TODO: Implement getAllClientsAchat() method.
        return self::$idaoImpClientAchat->findAll(self::CLASSNAMECLIENTAchat);


    }

    public function findAllActivatedClientsAchat()
    {
        // TODO: Implement findAllActivatedClientsAchat() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        return static::$idaoImpClientAchat->findAllActivated(self::CLASSNAMECLIENTAchat);

    }

    public function getClientAchat($id)
    {
        // TODO: Implement getClientAchat() method.
        return self::$idaoImpClientAchat->findById(self::CLASSNAMECLIENTAchat, $id);


    }

}