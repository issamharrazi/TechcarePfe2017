<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 05/04/2017
 * Time: 11:57
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface GenericIDao
{
    public function delete($document);

    public function findAll($class);

    public function findById($class, $id);

    public function findAllActivated($class);


}