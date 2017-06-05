<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 12:55
 */

namespace GuideTouristiqueBundle\Dao\IDao\TacheIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;


interface TacheIdao extends GenericIDao
{

    public function addTache($document);

    public function deleteTache($document);

    public function updateTache($document, $data);

    public function uploadRealizedTask($document, $data);

    public function changerEtatTache($document, $data);

    public function getTacheChangedByChefEquipe();

    public function getActivatedTaskofChefEquipe($chefequipeId);

    public function getActivatedTaskofAgent($agentId);


}