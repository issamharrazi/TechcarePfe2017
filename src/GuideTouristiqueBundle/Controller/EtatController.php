<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 16:13
 */

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EtatController extends Controller
{


    const SERVICENAME = 's.etat.impmetier';

    /**
     * @Rest\Post("/addEtatPack")
     * @param Request $request
     * @return JsonResponse
     */
    public function addEtatPackAction(Request $request)
    {


        // $data = json_decode($requestContent, true);


        $serviceEtat = $this->get(self::SERVICENAME);

        $etat = $serviceEtat->addEtat($request->getContent());

        return new JsonResponse($etat);
    }

    /**
     *
     * @Rest\Put("/updateEtatPack")
     */
    public function updateEtatPackAction(Request $request)
    {
        //     $data = json_decode($requestContent, true);$data = $requestContent;
        $serviceEtat = $this->get(self::SERVICENAME);
        $serviceEtat->updateEtat($request->getContent());


        return new JsonResponse("sucess");
    }

    /**
     * @Rest\Delete("/deleteEtatPack/{idEtat}")
     */
    public function deleteEtatPackAction(Request $request)
    {
        $serviceEtat = $this->get(self::SERVICENAME);
        $serviceEtat->deleteEtat($request->get('idEtat'));


        return new JsonResponse("success");
    }


    /**
     * @Rest\Get("/getAllEtatsPack")
     */
    public function getAllEtatsPackAction()
    {


        $serviceEtat = $this->get(self::SERVICENAME);
        $etats = $serviceEtat->getAllEtats();


        $etatsJson = Serialiser::serializer($etats);
        //$etatsJson = json_encode($etats);

        return new JsonResponse($etatsJson);

    }


    /**
     * afficher les categories des id,noms packs
     * @Rest\Get("/getEtatPack/{idEtat}")
     */
    public function getEtatPackAction(Request $request)
    {
        $serviceEtat = $this->get(self::SERVICENAME);
        $etat = $serviceEtat->getEtat($request->get('idEtat'));

        $etatJson = Serialiser::serializer($etat);
        return new JsonResponse($etatJson);
    }


    /**
     * @Route("/etat")
     */
    public function indexAction()
    {

        //  $serviceEtat = $this->get('s.etat.impmetier');

        // $serviceEtat->deleteEtat($id);
        //    $etatsJson = $serviceEtat->getAllEtats();

        //$serviceEtat = $this->get('s.etat.impmetier');

        $serviceEtat = $this->get(self::SERVICENAME);

        $data = [

            'nom' => 'Desactivated',
            'num' => 2
        ];
        $serviceEtat->addEtat($data);

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