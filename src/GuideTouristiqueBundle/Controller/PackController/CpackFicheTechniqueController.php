<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 10/04/2017
 * Time: 10:36
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CpackFicheTechniqueController extends Controller
{


    const SERVICENAME = 's.cpack_fiche_technique.impmetier';


    /**
     * @Rest\Post("/addCpackFicheTechnique")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCpackFicheTechniqueAction(Request $request)
    {

        //   $data = json_decode($request->getContent(), true);

        $serviceCpackFicheTechnique = $this->get(self::SERVICENAME);
        $cpackFicheTechnique = $serviceCpackFicheTechnique->addCpackFicheTechnique($request->getContent());

        return new JsonResponse($cpackFicheTechnique);
    }


    /*
        /**
         * @Route("/")
         */

    /*  public function indexAction()
      {

          //$id="3";


          $offre = ['id' =>'12','nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];
          $ficheTechnique = ['description' => 'le client s de so etablissemet'];
          $data = ['offre' => $offre , 'ficheTechnique' => $ficheTechnique];

          dump('controlleur',$data);

          $serviceCpackFicheTechnique = $this->get(self::SERVICENAME);
          $serviceCpackFicheTechnique->addCpackFicheTechnique($data);

          //$serviceOffre = $this->get(self::SERVICENAME);

        //  $serviceOffre->updateOffre($data);

          // $serviceOffre->addOffre($data);
        //  $serviceOffre ->deleteOffre($id);
         // $offresJson = $serviceOffre ->getAllOffre();

          //  $serviceFicheTechnique->updateFicheTechnique($data);

          //  $serviceFicheTechnique ->deleteFicheTechnique($id);
          // $ficheTechniquesJson = $serviceFicheTechnique->getAllFicheTechnique();

        //  dump($offresJson);
          return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
      }

  */

}