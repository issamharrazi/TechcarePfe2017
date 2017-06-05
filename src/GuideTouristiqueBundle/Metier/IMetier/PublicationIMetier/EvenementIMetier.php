<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 01:09
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier;


interface EvenementIMetier
{
    public function addEvenement($requestContent);
    public function updateEvenement($requestContent);
    public function deleteEvenement($id);
    public function getAllEvenements();
    public function getEvenement($id);

    public function findAllActivatedEvenement();

}