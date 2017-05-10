<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:33
 */

namespace GuideTouristiqueBundle\Dao\ImpDao;


use Exception;
use GuideTouristiqueBundle\Dao\IDao\CommentaireIdao;
use GuideTouristiqueBundle\Document\Commentaire;

class CommentaireImpDao extends GenericImplDao implements CommentaireIdao
{

    public function addCommentaire($data)
    {
        // TODO: Implement addCommentaire() method.
        $commentaire = new Commentaire($data['contenu'], date('Y-m-d H:i:s'), $data['etat']);
        try {


            $commentaire = static::$documentManager->merge($commentaire);
            static::$documentManager->flush();

        } catch (Exception $e) {
            echo 'Exception reçue : ', $e->getMessage(), "\n";
        }
        return $commentaire;
    }

    public function updateCommentaire($commentaire, $data)
    {
        // TODO: Implement updateCommentaire() method.

        $commentaire->setContenu($data['contenu']);
        $commentaire->setDateajout($data['dateajout']);
        $commentaire->setEtat($data['etat']);
        $commentaire = self::$documentManager->merge($commentaire);
        self::$documentManager->flush();


        return $commentaire;
    }
}