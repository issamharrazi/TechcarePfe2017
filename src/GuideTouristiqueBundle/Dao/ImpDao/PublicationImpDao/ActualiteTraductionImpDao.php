<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 21:04
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PublicationImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PublicationIDao\ActualiteTradutionIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\ActualiteTraduction;


class ActualiteTraductionImpDao extends GenericImplDao implements ActualiteTradutionIdao
{

    public function addActualitesTraduction($data)
    {
        // TODO: Implement addActualitesTraduction() method.
        $actualiteTraduction = new ActualiteTraduction($data['nom'], $data['contenu'], $data['langue'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));


        try {


            $actualiteTraduction = self::$documentManager->merge($actualiteTraduction);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $actualiteTraduction;
    }

    public function updateActualitesTraduction($actualiteTraduction, $data)
    {
        // TODO: Implement updateActualitesTraduction() method.
        $actualiteTraduction->setNom($data['nom']);
        $actualiteTraduction->setContenu($data['contenu']);
        $actualiteTraduction->setLangue($data['langue']);
        $actualiteTraduction->setDateAjout($data['etat']);
        $actualiteTraduction->setDateModification($data['etat']);

        $actualiteTraduction = self::$documentManager->merge($actualiteTraduction);
        self::$documentManager->flush();


        return $actualiteTraduction;
    }
}