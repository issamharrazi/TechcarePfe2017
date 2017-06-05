<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/06/2017
 * Time: 00:03
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface EtatRealisationIMetier
{

    public function addEtatRealisation($requestContent);

    public function updateEtatRealisation($requestContent);

    public function deleteEtatRealisation($id);

    public function getAllEtatsRealisation();

    public function getEtatRealisation($id);

    public function getEtatRealisationByNum($num);

}