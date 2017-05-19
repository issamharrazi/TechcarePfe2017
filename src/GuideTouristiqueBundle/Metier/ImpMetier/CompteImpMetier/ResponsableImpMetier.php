<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 18/05/2017
 * Time: 11:50
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\CompteImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CompteIMetier\ResponsableIMetier;

class ResponsableImpMetier implements ResponsableIMetier
{

    const CLASSNAMERESPONSABLE = 'Responsable';
    protected static $idaoImpResponsable;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CompteIDao\ResponsableIdao $idaoImpResponsable)
    {

        self::$idaoImpResponsable = $idaoImpResponsable;


    }

    public function addResponsable($data)
    {
        // TODO: Implement addResponsable() method.


        $responsable = self::$idaoImpResponsable->addResponsable($data);

        return $responsable;
    }

    public function updateResponsable($data)
    {
        // TODO: Implement updateResponsable() method.

        $resp = self::$idaoImpResponsable->findById(self::CLASSNAMERESPONSABLE, $data['id']);
        return self::$idaoImpResponsable->updateResponsable($resp, $data);

    }

    public function deleteResponsable($id)
    {
        // TODO: Implement deleteResponsable() method.
        $resp = self::$idaoImpResponsable->findById(self::CLASSNAMERESPONSABLE, $id);


        self::$idaoImpResponsable->delete($resp);
    }

    public function getAllResponsable()
    {
        // TODO: Implement getAllResponsable() method.

        return self::$idaoImpResponsable->findAll(self::CLASSNAMERESPONSABLE);


    }

    public function getResponsable($id)
    {
        // TODO: Implement getResponsable() method.
        return self::$idaoImpResponsable->findById(self::CLASSNAMERESPONSABLE, $id);


    }
}