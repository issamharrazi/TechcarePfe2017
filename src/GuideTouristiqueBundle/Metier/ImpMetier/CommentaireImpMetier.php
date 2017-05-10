<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:43
 */

namespace GuideTouristiqueBundle\Metier\ImpMetier;


use GuideTouristiqueBundle\Metier\IMetier\CommentaireIMetier;

class CommentaireImpMetier implements CommentaireIMetier
{
    const CLASSNAMECOMMENTAIRE = 'Commentaire';
    protected static $commentaireImpdao;
    protected static $etatImpMetier;

    public function __construct(\GuideTouristiqueBundle\Dao\IDao\CommentaireIdao $commentaireImpdao, \GuideTouristiqueBundle\Metier\IMetier\EtatIMetier $etatImpMetier)
    {


        self::$commentaireImpdao = $commentaireImpdao;
        self::$etatImpMetier = $etatImpMetier;

    }

    public function addCommentaire($data)
    {
        // TODO: Implement addCommentaire() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);

        return static::$commentaireImpdao->addCommentaire($data);

    }

    public function updateCommentaire($data)
    {
        // TODO: Implement updateCommentaire() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum($data['etat']['num']);

        $commentaire = static::$commentaireImpdao->findById(self::CLASSNAMECOMMENTAIRE, $data['id']);

        return static::$commentaireImpdao->updateCommentaire($commentaire, $data);

    }

    public function deleteCommentaire($id)
    {
        // TODO: Implement deleteCommentaire() method.
        $commentaire = static::$commentaireImpdao->findById(self::CLASSNAMECOMMENTAIRE, $id);
        static::$commentaireImpdao->delete($commentaire);

    }

    public function getAllCommentaires()
    {
        // TODO: Implement getAllCommentaires() method.
        return static::$commentaireImpdao->findAll(self::CLASSNAMECOMMENTAIRE);

    }

    public function getCommentaire($id)
    {
        // TODO: Implement getCommentaire() method.
        $commentaire = static::$commentaireImpdao->findById(self::CLASSNAMECOMMENTAIRE, $id);

        return $commentaire;
    }

    public function findAllActivatedCommentaires()
    {
        // TODO: Implement findAllActivatedCommentaires() method.
        $data['etat'] = self::$etatImpMetier->getEtatByNum(1);


        $commentaires = static::$commentaireImpdao->findAllActivated(self::CLASSNAMECOMMENTAIRE);

        return $commentaires;
    }
}