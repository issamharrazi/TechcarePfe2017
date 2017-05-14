<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 23:37
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PublicationImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\PublicationIDao\EvenementTraductionIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\EvenementTraduction;

class EvenementTraductionImpDao extends GenericImplDao implements EvenementTraductionIdao
{

    public function addEvenementTraduction($data)
    {
        // TODO: Implement addEvenementTraduction() method.
        $EvenementTraduction = new EvenementTraduction($data['nom'], $data['description'], $data['lieu'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'), $data['langue']);


        try {


            $EvenementTraductionn = self::$documentManager->merge($EvenementTraduction);
            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }

        return $EvenementTraduction;
    }

    public function updateEvenementTraduction($EvenementTraduction, $data)
    {

        // TODO: Implement updateEvenementTraduction() method.
        $EvenementTraduction->setNom($data['nom']);
        $EvenementTraduction->setLieu($data['lieu']);
        $EvenementTraduction->setDescription($data['description']);
        $EvenementTraduction->setLangue($data['langue']);
        $EvenementTraduction->setDateAjout($data['dateajout']);
        $EvenementTraduction->setDateModification($data['datemodification']);

        $EvenementTraduction = self::$documentManager->merge($EvenementTraduction);
        self::$documentManager->flush();


        return $EvenementTraduction;
    }
}