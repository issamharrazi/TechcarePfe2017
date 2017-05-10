<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:42
 */

namespace GuideTouristiqueBundle\Metier\IMetier;


interface CommentaireIMetier
{
    public function addCommentaire($requestContent);

    public function updateCommentaire($requestContent);

    public function deleteCommentaire($id);

    public function getAllCommentaires();

    public function getCommentaire($id);

    public function findAllActivatedCommentaires();


}