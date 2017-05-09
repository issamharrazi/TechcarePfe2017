<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 01/05/2017
 * Time: 02:11
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class OffreFicheTechniqueController extends Controller
{
    const SERVICENAME = 's.offre_fiche_technique.impmetier';


    /**
     * @Rest\Post("/addTechnicalSheetDeal")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTechnicalSheetDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffreFT = $this->get(self::SERVICENAME);
        $offreFT = $serviceOffreFT->addOffreFicheTechnique($data);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Get("/getTechnicalSheetDeals")
     * @return JsonResponse
     */
    public function getTechnicalSheetDealsAction()
    {
        $serviceOffreFT = $this->get(self::SERVICENAME);
        $offresFT = $serviceOffreFT->getAllOffreFicheTechnique();

        $offresFTJson = Serialiser::serializer($offresFT);

        return new JsonResponse($offresFTJson);
    }


    /**
     * @Rest\Get("/getActivatedTechnicalSheetDeals")
     * @return JsonResponse
     */
    public function getActivatedTechnicalSheetDeals()
    {
        $serviceOffreFT = $this->get(self::SERVICENAME);
        $offresFT = $serviceOffreFT->findAllActivatedOffresFicheTechnique();

        $offresFTJson = Serialiser::serializer($offresFT);

        return new JsonResponse($offresFTJson);
    }

    /**
     * @Rest\Get("/getTechnicalSheetDeal/{idDeal}")
     * @return JsonResponse
     */
    public function getTechnicalSheetDeal(Request $request)
    {


        $serviceOffreFT = $this->get(self::SERVICENAME);
        $offreFT = $serviceOffreFT->getOffreFicheTechnique($request->get('idDeal'));

        $offresFTJson = Serialiser::serializer($offreFT);

        return new JsonResponse($offresFTJson);

    }


    /**
     *
     * @Rest\Put("/updateTechnicalSheetDeal")
     */
    public function updateTechnicalSheetDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffreFT = $this->get(self::SERVICENAME);

        $offreFT = $serviceOffreFT->updateOffreFicheTechnique($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Delete("/deleteTechnicalSheetDeal/{idDeal}")
     */
    public function deleteTechnicalSheetDealAction(Request $request)
    {
        $serviceOffreFT = $this->get(self::SERVICENAME);
        $serviceOffreFT->deleteOffreFicheTechnique($request->get('idDeal'));


        return new JsonResponse("success");
    }


}