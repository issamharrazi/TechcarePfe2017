<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 10:12
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface LangueIdao extends GenericIDao
{

    public function addLangue($langue);

    public function updateLangueTraduction($oldLangue, $newLangue);
    public function updateLangue($oldLangue, $newLangue);

    //  public function findLangueByName($class, $name);
    // public function findLangueById($class, $name);
    public function selectActivatedDefaultLangues();

    public function selectTraductionsLangue($id);
    //   public function changeDefaultLangue($class, $name);


}