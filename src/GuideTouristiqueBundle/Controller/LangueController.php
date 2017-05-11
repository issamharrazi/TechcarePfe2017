<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 11/05/2017
 * Time: 11:01
 */

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class LangueController extends Controller
{


    const SERVICENAME = 's.language.impmetier';

    /**
     * @Rest\Post("/addLanguage")
     * @param Request $request
     * @return JsonResponse
     */
    public function addLanguageAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceLanguage = $this->get(self::SERVICENAME);
        $Language = $serviceLanguage->addLangue($data);

        //$devisesJson= Serialiser::serializer($devise);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Put("/updateLanguage")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateLanguageAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceLanguage = $this->get(self::SERVICENAME);
        $Language = $serviceLanguage->updateLangue($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllLanguages")
     * @return JsonResponse
     */
    public function getAllLanguagesAction()
    {


        $serviceLanguage = $this->get(self::SERVICENAME);
        $Languages = $serviceLanguage->getAllLangues();

        $LanguagesJson = Serialiser::serializer($Languages);

        return new JsonResponse($LanguagesJson);

    }


    /**
     * @Rest\Get("/getActivatedLanguages")
     * @return JsonResponse
     */
    public function getActivatedLanguagesAction()
    {


        $serviceLanguage = $this->get(self::SERVICENAME);
        $Languages = $serviceLanguage->findAllActivatedLanguage();

        $LanguagesJson = Serialiser::serializer($Languages);

        return new JsonResponse($LanguagesJson);

    }


    /**
     * @Rest\Get("/getLanguage/{idLanguage}")
     */
    public function getLanguageAction(Request $request)
    {
        $serviceLanguage = $this->get(self::SERVICENAME);
        $Language = $serviceLanguage->getLangue($request->get('idLanguage'));

        $LanguageJson = Serialiser::serializer($Language);
        return new JsonResponse($LanguageJson);


    }


    /**
     * @Rest\Delete("/deleteLanguage{idLanguage}")
     */
    public function deleteLanguageAction(Request $request)
    {
        $serviceLanguage = $this->get(self::SERVICENAME);
        $serviceLanguage->deleteLangue($request->get('idLanguage'));


        return new JsonResponse('success');
    }


}