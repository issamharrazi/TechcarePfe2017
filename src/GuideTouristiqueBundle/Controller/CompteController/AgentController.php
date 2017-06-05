<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 21/05/2017
 * Time: 01:01
 */

namespace GuideTouristiqueBundle\Controller\CompteController;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\Document\User;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class AgentController extends Controller
{
    const SERVICENAME = 's.agent.impmetier';


    /**
     * @Rest\Put("/updateAgent")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateAgentAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceAgent = $this->get(self::SERVICENAME);
        $Agent = $serviceAgent->updateAgent($data);


        return new JsonResponse('success');
    }

    /**
     * @Rest\Get("/getAllAgents")
     * @return JsonResponse
     */
    public function getAllAgentsAction()
    {


        $serviceAgent = $this->get(self::SERVICENAME);
        $Agents = $serviceAgent->getAllAgents();

        $AgentsJson = Serialiser::serializer($Agents);

        return new JsonResponse($AgentsJson);

    }

    /**
     * @Rest\Put("/changeStateAgent")
     * @param Request $request
     * @return JsonResponse
     */
    public function changeStateAgentAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceAgent = $this->get(self::SERVICENAME);
        $agent = $serviceAgent->changeEtatAgent($data);

        $agentJson = Serialiser::serializer($agent);

        return new JsonResponse($agentJson);
    }
    /**
     * @Rest\Get("/getActivatedAgents")
     * @return JsonResponse
     */
    public function getActivatedAgentsAction()
    {


        $serviceAgent = $this->get(self::SERVICENAME);
        $Agents = $serviceAgent->findAllActivatedAgents();

        $AgentsJson = Serialiser::serializer($Agents);

        return new JsonResponse($AgentsJson);

    }

    /**
     * @Rest\Get("/getAgent/{idAgent}")
     */
    public function getAgentAction(Request $request)
    {
        $serviceAgent = $this->get(self::SERVICENAME);
        $Agent = $serviceAgent->getAgent($request->get('idAgent'));

        $AgentJson = Serialiser::serializer($Agent);
        return new JsonResponse($AgentJson);


    }

    /**
     * @Rest\Delete("/deleteAgent/{idAgent}")
     */
    public function deleteAgentAction(Request $request)
    {
        $serviceAgent = $this->get(self::SERVICENAME);
        $serviceAgent->deleteAgent($request->get('idAgent'));


        return new JsonResponse('success');
    }

    /**
     * @param  Request $request
     * @param  FormInterface $form
     */
    private function processForm(Request $request, FormInterface $form)
    {
        $data = json_decode($request->getContent(), true);
        if ($data === null) {
            throw new BadRequestHttpException();
        }

        $form->submit($data);
    }


}