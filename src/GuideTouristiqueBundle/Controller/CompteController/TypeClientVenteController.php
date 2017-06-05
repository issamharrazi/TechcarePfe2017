<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 04/06/2017
 * Time: 07:53
 */

namespace GuideTouristiqueBundle\Controller\CompteController;


use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\Document\Media;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class TypeClientVenteController extends Controller
{


    const SERVICENAME = 's.type_client_vente.impmetier';

    /**
     * @Rest\Post("/addTypeClientVente")
     * @param Request $request
     * @return JsonResponse
     */
    public function addTypeClientVenteAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $TypeClientVente = $serviceTypeClientVente->addClientVenteType($data);

        //$devisesJson= Serialiser::serializer($devise);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Put("/updateTypeClientVente")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTypeClientVenteAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $TypeClientVente = $serviceTypeClientVente->updateClientVenteType($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllTypeClientsVente")
     * @return JsonResponse
     */
    public function getAllTypeClientVenteAction()
    {


        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $TypeClientVentes = $serviceTypeClientVente->getAllClientVenteType();

        $TypeClientVentesJson = Serialiser::serializer($TypeClientVentes);

        return new JsonResponse($TypeClientVentesJson);

    }


    /**
     * @Rest\Get("/getActivatedTypeClientVentes")
     * @return JsonResponse
     */
    public function getActivatedTypeClientVentesAction()
    {


        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $TypeClientVentes = $serviceTypeClientVente->findAllActivatedClientVenteType();

        $TypeClientVentesJson = Serialiser::serializer($TypeClientVentes);

        return new JsonResponse($TypeClientVentesJson);

    }


    /**
     * @Rest\Get("/getTypeClientVente/{idTypeClientVente}")
     */
    public function getTypeClientVenteAction(Request $request)
    {
        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $TypeClientVente = $serviceTypeClientVente->getClientVenteType($request->get('idTypeClientVente'));

        $TypeClientVenteJson = Serialiser::serializer($TypeClientVente);
        return new JsonResponse($TypeClientVenteJson);


    }


    /**
     * @Rest\Delete("/deleteTypeClientVente/{idTypeClientVente}")
     */
    public function deleteTypeClientVente(Request $request)
    {
        $serviceTypeClientVente = $this->get(self::SERVICENAME);
        $serviceTypeClientVente->deleteClientVenteType($request->get('idTypeClientVente'));


        return new JsonResponse('success');
    }

}