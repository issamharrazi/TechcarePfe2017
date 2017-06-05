<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 12:58
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\TacheImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\TacheIDao\TacheIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Fichier;
use GuideTouristiqueBundle\Document\Tache;


class TacheImpDao extends GenericImplDao implements TacheIdao
{

    public function addTache($data)
    {
        // TODO: Implement addTache() method.
        $tache = new Tache();
        $tache->setNom($data['nom']);
        $tache->setDescription($data['description']);
        $tache->setChefequipe($data['chefequipe']);
        $tache->setDatedebut(date('Y-m-d H:i:s'));
        $tache->setDatefin($data['datefin']);
        $tache->setEtat($data['etat']);
        $tache->setEtattemporaire($data['etattemporaire']);

        if (isset($data['fichierrelie'])) {
            $fichier = new Fichier($data['fichierrelie']['nom'], $data['fichierrelie']['type'], date('Y-m-d H:i:s'), $data['fichierrelie']['taille'], $data['fichierrelie']['media']);
            static::$documentManager->persist($fichier);
            static::$documentManager->flush();
            $tache->setFichierelie($fichier);

        }


        if (isset($data['agent'])) {
            $tache->setAgent($data['agent']);

        }


        try {


            $tache = static::$documentManager->merge($tache);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $tache;
    }

    public function updateTache($tache, $data)
    {

        // TODO: Implement updateTache() method.
        $tache->setNom($data['nom']);
        $tache->setDescription($data['description']);


        $tache->setChefequipe($data['chefequipe']);
        $tache->setDatedebut($data['datedebut']);
        $tache->setDatefin($data['datefin']);
        $tache->setEtat($data['etat']);
        $tache->setEtattemporaire($data['etattemporaire']);


        if (isset($data['fichierelie'])) {

            $fichierRelie = $tache->getFichierelie();

            $fichierRelie = self::$documentManager->getRepository('GuideTouristiqueBundle:Fichier')
                ->find($fichierRelie->getId());
            $fichierRelie->setNom($data['fichierelie']['nom']);
            $fichierRelie->setType($data['fichierelie']['type']);
            $fichierRelie->setTaille($data['fichierelie']['taille']);
            $fichierRelie->setMedia($data['fichierelie']['media']);
            $fichierRelie->setUploadDate($data['fichierelie']['uploadDate']);

            $fichierRelie = self::$documentManager->merge($fichierRelie);
            self::$documentManager->flush();

        }


        if (isset($data['tacherealise'])) {

            $tacherealise = $tache->getTacherealise();

            $tacherealise = self::$documentManager->getRepository('GuideTouristiqueBundle:Fichier')
                ->find($tacherealise->getId());
            $tacherealise->setNom($data['tacherealise']['nom']);
            $tacherealise->setType($data['tacherealise']['type']);
            $tacherealise->setTaille($data['tacherealise']['taille']);
            $tacherealise->setMedia($data['tacherealise']['media']);
            $tacherealise->setUploadDate($data['tacherealise']['uploadDate']);

            $tacherealise = self::$documentManager->merge($tacherealise);
            self::$documentManager->flush();

        }


        if (isset($data['agent'])) {
            $tache->setAgent($data['agent']);

        }



        $tache = self::$documentManager->merge($tache);
        self::$documentManager->flush();


        return $tache;
    }

    public function deleteTache($document)
    {
        // TODO: Implement deleteTache() method.
        $fichierRelie = $document->getFichierelie();
        try {
            if (isset($fichierRelie)) {
                $fichierRelie = self::$documentManager->getRepository('GuideTouristiqueBundle:Fichier')
                    ->find($fichierRelie->getId());

                self::$documentManager->remove($fichierRelie);
                self::$documentManager->flush();

            }
            //   dump($fichierRelie);

            $tacherealise = $document->getTacherealise();
            if (isset($tacherealise)) {
                $tacherealise = self::$documentManager->getRepository('GuideTouristiqueBundle:Fichier')
                    ->find($tacherealise->getId());

                self::$documentManager->remove($tacherealise);
                self::$documentManager->flush();

            }

            self::$documentManager->remove($document);
            self::$documentManager->flush();


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function changerEtatTache($tache, $data)
    {
        // TODO: Implement changerEtatTache() method.
        $tache->setEtat($data['etat']);
        dump("eeeeeeeeeee", $data['etattemporaire']);
        $tache->setEtattemporaire($data['etattemporaire']);
        $tache = self::$documentManager->merge($tache);
        self::$documentManager->flush();


        return $tache;
    }

    public function getTacheChangedByChefEquipe()
    {
        // TODO: Implement getTacheChangedByChefEquipe() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:Tache')
                ->findBy(array('etat.id' => 1, 'etattemporaire.id' => 2));


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function getActivatedTaskofChefEquipe($chefequipeId)
    {
        // TODO: Implement getTacheChangedByChefEquipe() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:Tache')
                ->findBy(array('etat.id' => 1, 'etattemporaire.id' => 1, 'chefequipe.id' => $chefequipeId));

            //
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }

    public function getActivatedTaskofAgent($agentId)
    {
        // TODO: Implement getTacheChangedByChefEquipe() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:Tache')
                ->findBy(array('etat.id' => 1, 'agent.id' => $agentId));

            //
        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }


    public function uploadRealizedTask($tache, $data)
    {


        if (isset($data['tacherealise'])) {
            $fichier = new Fichier($data['tacherealise']['nom'], $data['tacherealise']['type'], date('Y-m-d H:i:s'), $data['tacherealise']['taille'], $data['tacherealise']['media']);
            static::$documentManager->persist($fichier);
            static::$documentManager->flush();
            $tache->setTacherealise($fichier);

        }


        $tache = self::$documentManager->merge($tache);
        self::$documentManager->flush();


        // TODO: Implement uploadRealizedTask() method.
    }
}