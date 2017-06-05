<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/06/2017
 * Time: 00:11
 */

namespace GuideTouristiqueBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtatRealisationController extends Controller
{


    const SERVICENAME = 's.etat_realisation.impmetier';

    /**
     * @Route("/etatr")
     */
    public function indexAction()
    {

        //  $serviceEtat = $this->get('s.etat.impmetier');

        // $serviceEtat->deleteEtat($id);
        //    $etatsJson = $serviceEtat->getAllEtats();

        //$serviceEtat = $this->get('s.etat.impmetier');

        $serviceEtat = $this->get(self::SERVICENAME);

        $data = [

            'nom' => 'En Cours',
            'num' => 1
        ];
        $serviceEtat->addEtatRealisation($data);

        //  $x = $serviceEtat->getEtatByNum(1);
        // $etatsJson = $serviceEtat->getAllEtats();

        // dump($etatsJson);
        //   $serviceEtat = $this->get(self::SERVICENAME);
        //   $serviceEtat->deleteEtat($id);

        //     $etatsJson = $serviceEtat->getAllEtats();
        // $serviceEtat->updateEtat($data);

        //   dump($etatsJson);
        return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
    }


}