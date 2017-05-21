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
use GuideTouristiqueBundle\Document\ChefEquipe;
use GuideTouristiqueBundle\Document\ClientAchat;

class ChefEquipeImpDao extends GenericImplDao implements ChefEquipeIdao
{
    public function RegisterChefEquipe($data)
    {
        // TODO: Implement RegisterChefEquipe() method.
        $chefEquipe = new ChefEquipe();
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
        $chefEquipe = new ChefEquipe();

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
    }

    public function addClientAchatAuChefEquipe($clientAchat, $ChefEquipe)
    {
        // TODO: Implement addClientAchatAuChefEquipe() method.
    }

    public function addTacheAuChefEquipe($tache, $ChefEquipe)
    {
        // TODO: Implement addTacheAuChefEquipe() method.
    }

    public function addTacheAffecteeAuChefEquipe($tacheAffectee, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeAuChefEquipe() method.
    }

    public function addTacheAgentAuChefEquipe($agent, $ChefEquipe)
    {
        // TODO: Implement addTacheAgentAuChefEquipe() method.
    }

    public function addClientVenteTemporaireAuChefEquipe($clientVenteTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientVenteTemporaireAuChefEquipe() method.
    }

    public function addClientAchaTemporairetAuChefEquipe($clientAchatTemporaire, $ChefEquipe)
    {
        // TODO: Implement addClientAchaTemporairetAuChefEquipe() method.
    }

    public function addAgentTemporaireAuChefEquipe($agentTemporaire, $ChefEquipe)
    {
        // TODO: Implement addAgentTemporaireAuChefEquipe() method.
    }

    public function addTacheAffecteeTemporaireAuChefEquipe($tacheAffecteeTemporaire, $ChefEquipe)
    {
        // TODO: Implement addTacheAffecteeTemporaireAuChefEquipe() method.
    }


}