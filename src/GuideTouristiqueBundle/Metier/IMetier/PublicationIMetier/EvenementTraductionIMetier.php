<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 12/05/2017
 * Time: 23:55
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier;


interface EvenementTraductionIMetier
{

    public function addEvenementTraduction($requestContent);

    public function updateEvenementTraduction($requestContent);

    public function deleteEvenementTraduction($id);

    public function getAllEvenementsTraduction();


    public function getEvenementTraduction($id);
}