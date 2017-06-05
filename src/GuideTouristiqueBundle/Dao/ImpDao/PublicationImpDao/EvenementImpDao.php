<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 00:41
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PublicationImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PublicationIDao\EvenementIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Evenement;

class EvenementImpDao extends GenericImplDao implements EvenementIdao
{

    public function addEvenement($data)
    {
        // TODO: Implement addEvenement() method.
        $Evenement = new Evenement(date('Y-m-d H:i:s'), $data['datedebutevenement'], $data['datefinevenement'], $data['nom'], $data['description'], $data['lieu'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['etat']);


        try {

            self::$documentManager->persist($Evenement);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $Evenement;

    }


    public function updateEvenement($Evenement, $data)
    {

        // TODO: Implement updateEvenement() method.
        $Evenement->setDatepublication(date('Y-m-d H:i:s'));
        $Evenement->setDatedebutevenement($data['datedebutevenement']);
        $Evenement->setDatefinevenement($data['datefinevenement']);
        $Evenement->setNom($data['nom']);
        $Evenement->setDescription($data['description']);
        $Evenement->setLieu($data['lieu']);
        $Evenement->setDateAjout($data['dateAjout']);
        $Evenement->setDateModification(date('Y-m-d H:i:s'));
        $Evenement->setEtat($data['etat']);

        $Evenement = self::$documentManager->merge($Evenement);
        self::$documentManager->flush();


        return $Evenement;


    }
}