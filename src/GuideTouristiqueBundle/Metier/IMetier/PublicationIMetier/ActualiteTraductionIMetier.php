<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 21:15
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier;


interface ActualiteTraductionIMetier
{

    public function addActualiteTraduction($requestContent);

    public function updateActualiteTraduction($requestContent);

    public function deleteActualiteTraduction($id);

    public function getAllActualitesTraduction();


    public function getActualiteTraduction($id);
}