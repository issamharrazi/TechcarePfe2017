<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 13:11
 */

namespace GuideTouristiqueBundle\Metier\IMetier\TacheIMetier;

interface TacheIMetier
{
    public function addTache($requestContent);

    public function updateTache($requestContent);

    public function deleteTache($id);

    public function getAllTaches();

    public function findAllActivatedTaches();

    public function getTache($id);


}