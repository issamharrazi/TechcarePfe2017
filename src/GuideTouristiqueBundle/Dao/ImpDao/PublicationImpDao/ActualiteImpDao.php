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

    public function addActualites($data)
    {
        // TODO: Implement addActualites() method.
        $actualite = new Actualite(date('Y-m-d H:i:s'), $data['etat']);
        try {


            $actualite = self::$documentManager->merge($actualite);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $actualite;

    }

    public function updateActualites($actualite, $data)
    {
        // TODO: Implement updateActualites() method.
        $actualite->setDatepublication($data['datepublication']);
        $actualite->setEtat($data['etat']);

        $actualite = self::$documentManager->merge($actualite);
        self::$documentManager->flush();


        return $actualite;
    }
}