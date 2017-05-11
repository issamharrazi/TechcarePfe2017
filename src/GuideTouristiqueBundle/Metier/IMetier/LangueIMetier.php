<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 10:18
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface LangueIMetier
{
    public function addLangue($requestContent);

    public function updateLangue($requestContent);

    public function deleteLangue($id);

    public function getAllLangues();

    public function findAllActivatedLangues();

    public function getLangue($id);

    public function getLangueByNom($nom);

}