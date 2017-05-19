<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 11:47
 */

namespace GuideTouristiqueBundle\Metier\IMetier\CompteIMetier;


interface ResponsableIMetier
{

    public function addResponsable($requestContent);

    public function updateResponsable($requestContent);

    public function deleteResponsable($id);

    public function getAllResponsable();

    public function getResponsable($id);

}