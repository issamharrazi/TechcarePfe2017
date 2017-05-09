<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 15:42
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface EtatIdao extends GenericIDao
{
    public function addEtat($etat);

    public function updateEtat($oldEtat, $newEtat);

    public function findEtatByNum($class, $num);

}