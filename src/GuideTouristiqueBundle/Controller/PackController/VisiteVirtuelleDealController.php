<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 07/05/2017
 * Time: 01:43
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class VisiteVirtuelleDealController extends Controller
{
    const SERVICENAME = 's.offre_visite_virtuelle.impmetier';


    /**
     * @Rest\Post("/addVirtualVisitDeal")
     * @param Request $request
     * @return JsonResponse
     */
    public function addVirtualVisitDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceOffreVV = $this->get(self::SERVICENAME);
        $offreVV = $serviceOffreVV->addOffreVisiteVirtuelle($data);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Get("/getVirtualVisitDeals")
     * @return JsonResponse
     */
    public function getVirtualVisitDealsAction()
    {
        $serviceOffreVV = $this->get(self::SERVICENAME);
        $offresVV = $serviceOffreVV->getAllOffreVisiteVirtuelle();

        $offresVVJson = Serialiser::serializer($offresVV);

        return new JsonResponse($offresVVJson);
    }


    /**
     * @Rest\Get("/getActivatedVirtualVisitDeals")
     * @return JsonResponse
     */
    public function getActivatedVirtualVisitDealsAction()
    {
        $serviceOffreVV = $this->get(self::SERVICENAME);
        $offresVV = $serviceOffreVV->findAllActivatedVisiteVirtuelle();

        $offresVVJson = Serialiser::serializer($offresVV);

        return new JsonResponse($offresVVJson);
    }

    /**
     * @Rest\Get("/getVirtualVisitDeal/{idDeal}")
     * @return JsonResponse
     */
    public function getVirtualVisitDealAction(Request $request)
    {


        $serviceOffreVV = $this->get(self::SERVICENAME);
        $offreVV = $serviceOffreVV->getOffreVisiteVirtuelle($request->get('idDeal'));

        $offresVVJson = Serialiser::serializer($offreVV);

        return new JsonResponse($offresVVJson);

    }


    /**
     *
     * @Rest\Put("/updateVirtualVisitDeal")
     */
    public function updateVirtualVisitDealAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $serviceOffreVV = $this->get(self::SERVICENAME);

        $offreVV = $serviceOffreVV->updateOffreVisiteVirtuelle($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Delete("/deleteVirtualVisitDeal/{idDeal}")
     */
    public function deleteVirtualVisitDealAction(Request $request)
    {
        $serviceOffreVV = $this->get(self::SERVICENAME);
        $serviceOffreVV->deleteOffreVisiteVirtuelle($request->get('idDeal'));


        return new JsonResponse("success");
    }


}