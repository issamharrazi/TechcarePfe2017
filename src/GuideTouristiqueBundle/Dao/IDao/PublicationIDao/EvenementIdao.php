<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 13/05/2017
 * Time: 00:39
 */

namespace GuideTouristiqueBundle\Dao\IDao\PublicationIDao;

use GuideTouristiqueBundle\Dao\IDao\GenericIDao;

interface EvenementIdao extends GenericIDao
{
    public function addEvenement($Evenement);

    public function addCommentaireEvenement($Evenement, $data);

    public function updateCommentaireEvenement($Evenement, $data);
    //   public function deleteCommentaireActualite($actualites);
    //  public function showCommentairesActualite($actualites);
    //  public function showCommentaireActualite();

    public function updateEvenement($oldEvenement, $newEvenement);

}