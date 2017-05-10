<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:26
 */

namespace GuideTouristiqueBundle\Dao\IDao;


interface CommentaireIdao extends GenericIDao
{
    public function addCommentaire($document);

    public function updateCommentaire($document, $data);

}