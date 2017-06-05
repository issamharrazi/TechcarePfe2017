<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 19:51
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;

use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ClientVenteIMetier;

class ClientVenteImpMetier implements ClientVenteIMetier
{

    const CLASSNAMECLIENTVENTE = 'Client';
    protected static $idaoImpClientVente;
    protected static $etatImpMetier;
    protected static $typeTradImpMetier;
    protected static $responsableImpMetier;
    protected static $adresseImpMetier;
    protected static $imageImpMetier;
    protected static $clientImpMetier;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientVenteIdao $idaoImpClientVente, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ClientVenteTypeIMetier $typeImpMetier, \GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ResponsableIMetier $responsableImpMetier, \GuideTouristiqueBundle\Metier\IMetier\AdresseIMetier $adresseImpMetier, \GuideTouristiqueBundle\Metier\IMetier\ImageIMetier $imageImpMetier)
    {

        self::$idaoImpClientVente = $idaoImpClientVente;

        //  self::$clientImpMetier = $clientImpMetier;

        self::$etatImpMetier = $etatImpMetier;
        self::$imageImpMetier = $imageImpMetier;
        self::$responsableImpMetier = $responsableImpMetier;
        self::$adresseImpMetier = $adresseImpMetier;
        self::$typeTradImpMetier = $typeImpMetier;


    }


    public function addClientVente($data)
    {
        // TODO: Implement addClientVente() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);
        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum(1);
        $data['type'] = json_decode($data['type'], true);
        $data['type'] = self::$typeTradImpMetier->getClientVenteType($data['type']['id']);
        if (!(self::$idaoImpClientVente->FindByMail($data['email'], self::CLASSNAMECLIENTVENTE))) {
            $clientVente = self::$idaoImpClientVente->RegisterClientVente($data);

            return $clientVente;
        } else
            return null;
    }

    public function updateClientVente($data)
    {
        // TODO: Implement updateClientVente() method.
        //etat
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum($data['etattemporaire']['num']);
        $data['type'] = self::$typeTradImpMetier->getClientVenteType($data['type']['id']);
        /*
        //type
                $data['typetrad'] = self::$typeTradImpMetier->getClientVenteType($data['typetrad']['id']);
                $data['adresse'] = self::$adresseImpMetier->updateAdresse($data['adresse']);


                $data['image'] = self::$imageImpMetier->updateImage($data['image']);

                //responsables
                for ($i = 0; $i < count($data['responsables']); $i++) {
                    if ($data['responsables'][$i]['typeoperation'] == "add")
                        $data['responsables'][$i] = self::$responsableImpMetier->addResponsable($data['responsables'][$i]);
                    elseif ($data['responsables'][$i]['typeoperation'] == "update")
                        $data['responsables'][$i] = self::$responsableImpMetier->updateResponsable($data['responsables'][$i]);
                    elseif ($data['responsables'][$i]['typeoperation'] == "delete")
                        $data['responsables'][$i] = self::$responsableImpMetier->deleteResponsable($data['responsables'][$i]['id']);


                    $data['responsables'][$i] = self::$responsableImpMetier->addResponsable($data['responsables'][$i]);
                }
        */

        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $data['id']);
        return self::$idaoImpClientVente->UpdateClientVente($clientVente, $data);

    }


    public function deleteClientVente($id)
    {

        // TODO: Implement deleteClientVente() method.
        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $id);
        $adresse = $clientVente->getAdresse();
        if (isset($adresse))
            self::$adresseImpMetier->deleteAdresse($clientVente->getAdresse()->getId());

        $image = $clientVente->getImage();
        if (isset($image))
            self::$imageImpMetier->deleteImage($clientVente->getImage()->getId());

        $responsables = $clientVente->getResponsables();
        if (isset($responsables)) {
            foreach ($clientVente->getResponsables() as $responsable) {
                self::$responsableImpMetier->deleteResponsable($responsable->get['id']);

            }
        }


        self::$idaoImpClientVente->delete($clientVente);

    }

    public function getAllClientsVente()
    {
        // TODO: Implement getAllClientsVente() method.
        return self::$idaoImpClientVente->FindAdminByRole('ROLE_CLIENT_VENTE', self::CLASSNAMECLIENTVENTE);


    }

    public function findAllActivatedClientsVente()
    {
        // TODO: Implement findAllActivatedClientsVente() method.r
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $clientsVente = static::$idaoImpClientVente->findAllActivated(self::CLASSNAMECLIENTVENTE);

        return $clientsVente;
    }

    public function getClientVente($id)
    {
        // TODO: Implement getClientVente() method.
        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $id);


        return $clientVente;
    }


    public function addClientAchatAuClientVente($clientVente, $clientAchat)
    {
        // TODO: Implement addClientAchatAuClientVente() m
        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $clientVente->getId());
        return self::$idaoImpClientVente->addClientAchatAuClientVente($clientVente, $clientAchat);

    }

    public function DesactiveClientVenteTemporairement($clientVente, $data)
    {
        // TODO: Implement DesactiveClientVenteTemporairement() method.

        $data['etattemporaire'] = self::$etatImpMetier->getEtatByNum(2);
        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $data['id']);
        return self::$idaoImpClientVente->DesactiveClientVenteTemporairement($clientVente, $data);

    }

    public function UpdateNbreVisiteClientVente($data, $nbreVisite)
    {
        // TODO: Implement UpdateNbreVisiteClientVente() method.


        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $data['id']);
        return self::$idaoImpClientVente->UpdateNbreVisiteClientVente($clientVente, $nbreVisite);

    }

    public function UpdateChefEquipeClientVente($data, $chefEquipe)
    {
        // TODO: Implement UpdateChefEquipeClientVente() method.

        //  $data['typetrad'] = self::$typeTradImpMetier->getClientVenteType($data['typetrad']['id']);


        $clientVente = self::$idaoImpClientVente->findById(self::CLASSNAMECLIENTVENTE, $data['id']);
        return self::$idaoImpClientVente->UpdateChefEquipeClientVente($clientVente, $data);

    }
}