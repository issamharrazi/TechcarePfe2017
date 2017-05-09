<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 15:19
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\PackIDao\PubliciteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\CpackPublicite;


class CpackPubliciteImpDao extends GenericImplDao implements PubliciteIdao
{

    public function addPublicite($data)
    {
        // TODO: Implement addPublicite() method.

        $cpackPublicite = new CpackPublicite($data['offre'], $data['publicite'], $data['categorie']);

        try {


            $cpackPublicite = self::$documentManager->merge($cpackPublicite);

            self::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $cpackPublicite;

    }

    public function updatePublicite($document, $data)
    {
        // TODO: Implement updatePublicite() method.
    }
}