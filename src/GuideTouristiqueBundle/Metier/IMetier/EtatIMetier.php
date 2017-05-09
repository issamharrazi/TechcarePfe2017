<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 15:51
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface EtatIMetier
{
    public function addEtat($requestContent);

    public function updateEtat($requestContent);

    public function deleteEtat($id);

    public function getAllEtats();

    public function getEtat($id);

    public function getEtatByNum($num);

}