<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 23:57
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PublicationImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier\EvenementTraductionIMetier;

class EvenementTraductionImpMetier implements EvenementTraductionIMetier
{

    const CLASSNAMEEVENEMENTTRADUCTION = 'EvenementTraduction';
    protected static $idaoImpEvenementTraduction;
    protected static $metierImpLangue;


    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PublicationIDao\EvenementTraductionIdao $idaoImpEvenementTraduction, \GuideTouristiqueBundle\Metier\IMetier\LangueIMetier $metierImpLangue)
    {

        self::$idaoImpEvenementTraduction = $idaoImpEvenementTraduction;
        self::$metierImpLangue = $metierImpLangue;


    }

    public function addEvenementTraduction($data)
    {
        // TODO: Implement addEvenementTraduction() method.
        $data['langue'] = self::$metierImpLangue->getLangueByNom($data['langue']['nom']);

        $EvenementTraduction = self::$idaoImpEvenementTraduction->addEvenementTraduction($data);

        return $EvenementTraduction;
    }

    public function updateEvenementTraduction($data)
    {
        // TODO: Implement updateEvenementTraduction() method.
        $EvenementTraduction = self::$idaoImpEvenementTraduction->findById(self::CLASSNAMEEVENEMENTTRADUCTION, $data['id']);
        return self::$idaoImpEvenementTraduction->updateEvenementTraduction($EvenementTraduction, $data);

    }

    public function deleteEvenementTraduction($id)
    {
        // TODO: Implement deleteEvenementTraduction() method.
        $EvenementTraduction = self::$idaoImpEvenementTraduction->findById(self::CLASSNAMEEVENEMENTTRADUCTION, $id);


        self::$idaoImpEvenementTraduction->delete($EvenementTraduction);

    }

    public function getAllEvenementsTraduction()
    {
        // TODO: Implement getAllEvenementsTraduction() method.
        $EvenementsTraduction = self::$idaoImpEvenementTraduction->findAll(self::CLASSNAMEEVENEMENTTRADUCTION);


        return $EvenementsTraduction;
    }

    public function getEvenementTraduction($id)
    {
        // TODO: Implement getEvenementTraduction() method.
        $EvenementTraduction = self::$idaoImpEvenementTraduction->findById(self::CLASSNAMEEVENEMENTTRADUCTION, $id);


        return $EvenementTraduction;
    }
}