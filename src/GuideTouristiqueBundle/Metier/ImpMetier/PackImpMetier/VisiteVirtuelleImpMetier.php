<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 15:10
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier\PackImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\PackIMetier\VisiteVirtuelleIMetier;

class VisiteVirtuelleImpMetier implements VisiteVirtuelleIMetier
{
    const CLASSNAMEVISITEVIRTUELLE = 'VisiteVirtuelle';
    protected static $visiteVirtuelleImpdao;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\PackIDao\VisiteVirtuelleIdao $visiteVirtuelleImpdao)
    {


        self::$visiteVirtuelleImpdao = $visiteVirtuelleImpdao;

    }

    public function addVisiteVirtuelle($data)
    {
        // TODO: Implement addVisiteVirtuelle() method.
        return static::$visiteVirtuelleImpdao->addVisiteVirtuelle($data);

    }

    public function updateVisiteVirtuelle($data)
    {
        // TODO: Implement updateVisiteVirtuelle() method.
        $visiteVirtuelle = static::$visiteVirtuelleImpdao->findById(self::CLASSNAMEVISITEVIRTUELLE, $data['id']);
        static::$visiteVirtuelleImpdao->updateVisiteVirtuelle($visiteVirtuelle, $data);

    }

    public function deleteVisiteVirtuelle($id)
    {
        // TODO: Implement deleteVisiteVirtuelle() method.
        $visiteVirtuelle = static::$visiteVirtuelleImpdao->findById(self::CLASSNAMEVISITEVIRTUELLE, $id);
        static::$visiteVirtuelleImpdao->delete($visiteVirtuelle);

    }

    public function getAllVisiteVirtuelles()
    {
        // TODO: Implement getAllVisiteVirtuelles() method.
        $visiteVirtuelles = static::$visiteVirtuelleImpdao->findAll(self::CLASSNAMEVISITEVIRTUELLE);


        return $visiteVirtuelles;
    }

    public function getVisiteVirtuelle($id)
    {
        // TODO: Implement getVisiteVirtuelle() method.
        $visiteVirtuelle = static::$visiteVirtuelleImpdao->findById(self::CLASSNAMEVISITEVIRTUELLE, $id);

        return $visiteVirtuelle;
    }
}