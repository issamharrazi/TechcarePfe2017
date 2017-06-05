<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 04:35
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class SuperAdminController extends Controller
{
    const SERVICENAME = 's.super_admin.impmetier';

    /**
     * @Rest\Put("/updateSuperAdmin")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateSuperAdminAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->updateSuperAdmin($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllSuperAdmin")
     * @return JsonResponse
     */
    public function getAllSuperAdminAction()
    {


        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->getAllSuperAdmins();

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);

        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Get("/getActivatedSuperAdmin")
     * @return JsonResponse
     */
    public function getActivatedSuperAdminAction()
    {


        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->findAllActivatedSuperAdmins();

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);

        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Get("/getSuperAdmin/{idSuperAdmin}")
     */
    public function getSuperAdminAction(Request $request)
    {
        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->getSuperAdmin($request->get('idSuperAdmin'));

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);
        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Get("/getSuperAdminByMail/{mail}")
     */
    public function getSuperAdminByMailAction(Request $request)
    {
        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $SuperAdmin = $serviceSuperAdmin->getSuperAdminByMail($request->get('mail'));

        $SuperAdminJson = Serialiser::serializer($SuperAdmin);
        return new JsonResponse($SuperAdminJson);

    }

    /**
     * @Rest\Delete("/deleteSuperAdmin/{idSuperAdmin}")
     */
    public function deleteSuperAdminAction(Request $request)
    {
        $serviceSuperAdmin = $this->get(self::SERVICENAME);
        $serviceSuperAdmin->deleteSuperAdmin($request->get('idSuperAdmin'));


        return new JsonResponse('success');
    }



}