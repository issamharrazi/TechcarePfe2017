<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 19/05/2017
 * Time: 15:49
 */

namespace GuideTouristiqueBundle\Dao\ImpDao\CompteImpDao;

use Exception;
use GuideTouristiqueBundle\Dao\IDao\CompteIDao\ClientIdao;
use GuideTouristiqueBundle\Dao\ImpDao\GenericImplDao;

class ClientImpDao extends GenericImplDao implements ClientIdao
{

    public function FindClientByMail($mail)
    {
        // TODO: Implement FindClientByMail() method.
        try {

            return self::$documentManager->getRepository('GuideTouristiqueBundle:Client')
                ->findOneBy(['email' => $mail, 'etat.num' => 1]);


        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
    }
}