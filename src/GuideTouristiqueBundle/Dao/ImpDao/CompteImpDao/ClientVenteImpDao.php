<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 18:31
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientVenteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Client;
use GuideTouristiqueBundle\Document\ClientVente;

class ClientVenteImpDao extends GenericImplDao implements ClientVenteIdao
{


    public function RegisterClientVente($data)
    {
        // TODO: Implement RegisterClientVente() method.
        $clientVente = new Client();
        $clientVente->setUsername($data['username']);
        $clientVente->setEmail($data['email']);
        $clientVente->setPlainPassword($data['password']);
        $clientVente->setEnabled(true);
        //  $clientVente->setNometablissement($data['nometablissement']);
        // $clientVente->setTypetrad($data['typetrad']);
        //  $clientVente->setChefequipe(null);


        $clientVente->addRole('ROLE_CLIENT_VENTE');
        $clientVente->setEtat($data['etat']);
        $clientVente->setEtattemporaire($data['etat']);
        $clientVente->setType($data['type']);
        try {


            static::$documentManager->persist($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $clientVente;
    }

    public function UpdateClientVente($clientVente, $data)
    {

        // TODO: Implement updateClientVente() method.
        $clientVente->setEmail($data['email']);
        $clientVente->setPlainPassword($data['password']);
        $clientVente->setType($data['type']);
        $clientVente->setUsername($data['username']);


        $clientVente->setEtat($data['etat']);
        //$clientVente->setChefequipe($data['chefequipe']);


        $clientVente->setEtattemporaire($data['etattemporaire']);


        try {


            $clientVente = static::$documentManager->merge($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $clientVente;
    }


    public function DesactiveClientVenteTemporairement($clientVente, $data)
    {

        $clientVente->setEtattemporaire($data['etattemporaire']);


        try {


            static::$documentManager->merge($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function addClientAchatAuClientVente($clientVente, $clientAchat)
    {

        // TODO: Implement addClientAchatAuClientVente() method.
        $clientVente->addClientsachat($clientAchat);


        try {


            static::$documentManager->merge($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    //set visite
    public function UpdateNbreVisiteClientVente($clientVente, $nbreVisite)
    {

        // TODO: Implement addClientAchatAuClientVente() method.
        $clientVente->setNombrevisite($nbreVisite);


        try {


            static::$documentManager->merge($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function UpdateChefEquipeClientVente($clientVente, $chefEquipe)
    {
        // TODO: Implement UpdateChefEquipeClientVente() method.
        $clientVente->setChefequipe($chefEquipe);


        try {


            static::$documentManager->merge($clientVente);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}