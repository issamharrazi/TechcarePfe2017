<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 08/05/2017
 * Time: 13:48
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\PackImpDao;

use GuideTouristiqueBundle\Dao\IDao\PackIDao\PubliciteIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;
use GuideTouristiqueBundle\Document\Publicite;

class PubliciteImpDao extends GenericImplDao implements PubliciteIdao
{

    public function addPublicite($data)
    {
        // TODO: Implement addPublicite() method.


        $publicite = new Publicite($data['type']);


        for ($i = 0; $i < count($data['images']); $i++) {
            $publicite->addImage($data['images'][$i]);
        }


        $publicite = self::$documentManager->merge($publicite);
        self::$documentManager->flush();


        return $publicite;

    }

    public function updatePublicite($document, $data)
    {
        // TODO: Implement updatePublicite() method.

    }
}