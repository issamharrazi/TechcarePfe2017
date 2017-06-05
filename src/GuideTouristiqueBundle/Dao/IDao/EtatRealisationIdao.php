<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 31/05/2017
 * Time: 23:59
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface EtatRealisationIdao extends GenericIDao
{
    public function addEtatRealisation($etat);

    public function updateEtatRealisation($oldEtat, $newEtat);

    public function findEtatRealisationByNum($class, $num);

}