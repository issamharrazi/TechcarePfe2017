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
        $Evenement = new Evenement(date('Y-m-d H:i:s'), $data['debutevenement'], $data['finevenement'], $data['etat']);


        try {

            for ($i = 0; $i < count($data['evenementtraduction']); $i++) {
                $Evenement->addEvenementtraduction($data['evenementtraduction'][$i]);
            }


            $Evenement = self::$documentManager->merge($Evenement);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $Evenement;

    }

    public function addCommentaireEvenement($Evenement, $data)
    {

        // TODO: Implement addCommentaireEvenement() method.
        $Evenement->addCommentaire($data['commentaire']);
        self::$documentManager->persist($Evenement);
        self::$documentManager->flush();


        return $Evenement;
    }

    public function updateCommentaireEvenement($Evenement, $data)
    {
        // TODO: Implement updateCommentaireEvenement() method.
        //   $actualite = new Actualite(date('Y-m-d H:i:s'), $data['etat']);

        // $actualite->($data['commentaire']);


        $actualite = self::$documentManager->merge($Evenement);
    }

    public function updateEvenement($Evenement, $data)
    {

        // TODO: Implement updateEvenement() method.
        $Evenement->setDatepublication($data['datepublication']);
        $Evenement->setDatedebutevenement($data['debutevenement']);
        $Evenement->setDatefinevenement($data['finevenement']);
        $Evenement->setEtat($data['etat']);

        $Evenement = self::$documentManager->merge($Evenement);
        self::$documentManager->flush();


        return $Evenement;


    }
}