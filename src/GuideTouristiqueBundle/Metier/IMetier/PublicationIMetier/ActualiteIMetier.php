<?php

/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 12:02
 */

namespace GuideTouristiqueBundle\Metier\IMetier\PublicationIMetier;
interface ActualiteIMetier
{
    public function addActualite($requestContent);

    public function addCommentaireActualite($data);

    public function updateCommentaireActualite($data);

    public function updateActualite($requestContent);

    public function deleteActualite($id);

    public function getAllActualites();

    public function findAllActivatedActualites();

    public function getActualite($id);

}