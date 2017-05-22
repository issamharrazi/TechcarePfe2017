<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 02:56
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientAchatIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Client;


class ClientAchatImpDao extends GenericImplDao implements ClientAchatIdao
{



    public function addClientVenteAuClientAchat($clientVente, $clientAchat)
    {

        // TODO: Implement addClientVenteAuClientAchat() method.
        $clientAchat->addClientsvente($clientVente);


        try {


            static::$documentManager->merge($clientAchat);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function RegisterClientAchat($data)
    {

        // TODO: Implement RegisterClientAchat() method.
        $clientAchat = new Client();
        // $clientAchat->setUsername($data['username']);
        $clientAchat->setEmail($data['email']);
        // $clientAchat->setPassword($data['password']);

        $clientAchat->setPlainPassword($data['password']);
        $clientAchat->setEnabled(true);
        // $clientAchat->setNom($data['nom']);
        //  $clientAchat->setPrenom($data['prenom']);
        // $clientAchat->setChefequipe(null);


        $clientAchat->addRole('ROLE_CLIENT_VENTE');
        $clientAchat->setEtat($data['etat']);
        $clientAchat->setEtattemporaire($data['etat']);
        try {


            static::$documentManager->persist($clientAchat);

            static::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $clientAchat;
    }

    public function UpdateClientAchat($clientAchat, $data)
    {
        // TODO: Implement UpdateClientAchat() method.
        $clientAchat->setEmail($data['email']);
        $clientAchat->setPlainPassword($data['password']);
        $clientAchat->setNom($data['nom']);
        $clientAchat->setPrenom($data['prenom']);
        $clientAchat->setImage($data['image']);
        $clientAchat->setNumtel($data['numtel']);
        $clientAchat->setAdresse($data['adresse']);


        // $clientAchat->setChefequipe($data['chefequipe']);


        $clientAchat->setEtat($data['etat']);
        $clientAchat->setEtattemporaire($data['etattemporaire']);
        try {


            $clientAchat = static::$documentManager->merge($clientAchat);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $clientAchat;
    }

    public function UpdateChefEquipeClientAchat($clientAchat, $chefEquipe)
    {
        // TODO: Implement UpdateChefEquipeClientAchat() method.
        //  $clientAchat->setChefequipe($chefEquipe);


        try {


            static::$documentManager->merge($clientAchat);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }

    public function DesactiveClientAchatTemporairement($clientAchat, $data)
    {
        // TODO: Implement DesactiveClientAchatTemporairement() method.
        $clientAchat->setEtattemporaire($data['etattemporaire']);


        try {


            static::$documentManager->merge($clientAchat);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}