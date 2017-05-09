<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 16:27
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PackIMetier;


interface CategorieIMetier
{
    public function addCategorie($requestContent);

    public function updateCategorie($requestContent);

    public function deleteCategorie($id);

    public function getAllCategorie();

    public function getCategorie($id);

    public function getCategorieByNum($num);

}