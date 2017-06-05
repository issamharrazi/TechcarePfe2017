<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 11:31
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PublicationImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PublicationIDao\ActualiteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Actualite;

class ActualiteImpDao extends GenericImplDao implements ActualiteIdao
{

    public function addActualite($data)
    {
        // TODO: Implement addActualites() method.
        $actualite = new Actualite(date('Y-m-d H:i:s'), $data['nom'], $data['contenu'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['etat']);


        try {


            self::$documentManager->persist($actualite);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $actualite;

    }

    public function updateActualite($actualite, $data)
    {

        // TODO: Implement updateActualites() method.
        $actualite->setNom($data['nom']);
        $actualite->setContenu($data['contenu']);
        $actualite->setDatepublication(date('Y-m-d H:i:s'));
        $actualite->setDateModification(date('Y-m-d H:i:s'));
        $actualite->setDateAjout($data['dateAjout']);
        $actualite->setEtat($data['etat']);

        $actualite = self::$documentManager->merge($actualite);
        self::$documentManager->flush();


        return $actualite;
    }



}