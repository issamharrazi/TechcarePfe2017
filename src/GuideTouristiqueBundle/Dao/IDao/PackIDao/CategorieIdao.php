<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 11:51
 */

namespace GuideTouristiqueBundle\Dao\IDao\PackIDao;


use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface CategorieIdao extends GenericIDao
{
    public function addCategorie($document);

    public function updateCategorie($document, $data);

    public function findByNum($class, $num);

}
