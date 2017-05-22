<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 01:36
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\ChefEquipeIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Admin;
use GuideTouristiqueBundle\Document\ChefEquipe;

class ChefEquipeImpDao extends GenericImplDao implements ChefEquipeIdao
{
    public function RegisterChefEquipe($data)
    {
        // TODO: Implement RegisterChefEquipe() method.
        $chefEquipe = new Admin();
        // $clientAchat->setUsername($data['username']);
        $chefEquipe->setEmail($data['email']);
        // $clientAchat->setPassword($data['password']);

        $chefEquipe->setPlainPassword($data['password']);
        $chefEquipe->setEnabled(true);
        // $clientAchat->setNom($data['nom']);
        //  $clientAchat->setPrenom($data['prenom']);
        // $clientAchat->setChefequipe(null);


        $chefEquipe->addRole('ROLE_CHEFEQUIPE');
        $chefEquipe->setEtat($data['etat']);
        try {


            static::$documentManager->persist($chefEquipe);

            static::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $chefEquipe;

    }

    public function UpdateChefEquipe($chefEquipe, $data)
    {
        // TODO: Implement UpdateChefEquipe() method.

        $chefEquipe->setEmail($data['email']);
        $chefEquipe->setPlainPassword($data['password']);
        $chefEquipe->setNom($data['nom']);
        $chefEquipe->setPrenom($data['prenom']);
        $chefEquipe->setImage($data['image']);
        $chefEquipe->setNumtel($data['numtel']);
        $chefEquipe->setAdresse($data['adresse']);


        $chefEquipe->setEtat($data['etat']);
        try {


            $chefEquipe = static::$documentManager->merge($chefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $chefEquipe;
    }

    public function addClientVenteAuChefEquipe($clientVente, $ChefEquipe)
    {

        // TODO: Implement addClientVenteAuChefEquipe() method.
        $ChefEquipe->addClientsvente($clientVente);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addClientAchatAuChefEquipe($clientAchat, $ChefEquipe)
    {
        // TODO: Implement addClientAchatAuChefEquipe() method.


        $ChefEquipe->addClientsachat($clientAchat);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addTacheAuChefEquipe($tache, $ChefEquipe)
    {
        // TODO: Implement addTacheAuChefEquipe() method.

        $ChefEquipe->addTach($tache);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

    }

    public function addTacheAffecteeAuChefEquipe($tacheAffectee, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeAuChefEquipe() method.

        $ChefEquipe->addTachesaffectee($tacheAffectee);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addTacheAgentAuChefEquipe($agent, $ChefEquipe)
    {
        // TODO: Implement addTacheAgentAuChefEquipe() method.

        $ChefEquipe->addAgent($agent);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addClientVenteTemporaireAuChefEquipe($clientVenteTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientVenteTemporaireAuChefEquipe() method.

        $ChefEquipe->addAgent($clientVenteTemporaire);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addClientAchaTemporairetAuChefEquipe($clientAchatTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientAchaTemporairetAuChefEquipe() method.

        $ChefEquipe->addAgent($clientAchatTemporaire);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addAgentTemporaireAuChefEquipe($agentTemporaire, $ChefEquipe)
    {
        // TODO: Implement addAgentTemporaireAuChefEquipe() method.

        $ChefEquipe->addAgent($agentTemporaire);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function addTacheAffecteeTemporaireAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeTemporaireAuChefEquipe() method.

        $ChefEquipe->addAgent($tacheAffecteeTemporaire);


        try {


            static::$documentManager->merge($ChefEquipe);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


}