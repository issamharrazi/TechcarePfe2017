<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/05/2017
 * Time: 22:37
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface DureeIMetier
{

    public function addDuree($requestContent);

    public function updateDuree($requestContent);

    public function deleteDuree($id);

    public function getAllDuree();

    public function getDuree($id);

}