<?php
/**
 * Created by PhpStorm.
 * User: issam
 * Date: 10/05/2017
 * Time: 16:58
 */

namespace GuideTouristiqueBundle\Controller;

use FOS\RestBundle\Controller\Annotations as Rest;
use GuideTouristiqueBundle\services\Serialiser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommentaireController extends Controller
{

    const SERVICENAME = 's.commentaire.impmetier';

    /**
     * @Rest\Post("/addComment")
     * @param Request $request
     * @return JsonResponse
     */
    public function addCommentAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceComment = $this->get(self::SERVICENAME);
        $comment = $serviceComment->addCommentaire($data);

        //$devisesJson= Serialiser::serializer($devise);

        return new JsonResponse('ok');
    }


    /**
     * @Rest\Put("/updateComment")
     * @param Request $request
     * @return JsonResponse
     */
    public function updateCommentAction(Request $request)
    {

        $data = json_decode($request->getContent(), true);

        $serviceComment = $this->get(self::SERVICENAME);
        $comment = $serviceComment->updateCommentaire($data);


        return new JsonResponse('success');
    }


    /**
     * @Rest\Get("/getAllComments")
     * @return JsonResponse
     */
    public function getAllCommentsAction()
    {


        $serviceComment = $this->get(self::SERVICENAME);
        $comments = $serviceComment->getAllCommentaires();

        $commentsJson = Serialiser::serializer($comments);

        return new JsonResponse($commentsJson);

    }


    /**
     * @Rest\Get("/getActivatedComments")
     * @return JsonResponse
     */
    public function getActivatedCommentsAction()
    {


        $serviceComment = $this->get(self::SERVICENAME);
        $comments = $serviceComment->findAllActivatedCommentaires();

        $commentsJson = Serialiser::serializer($comments);

        return new JsonResponse($commentsJson);

    }


    /**
     * @Rest\Get("/getComment/{idComment}")
     */
    public function getCommentAction(Request $request)
    {
        $serviceComment = $this->get(self::SERVICENAME);
        $comment = $serviceComment->getCommentaire($request->get('idComment'));

        $commentJson = Serialiser::serializer($comment);
        return new JsonResponse($commentJson);


    }


    /**
     * @Rest\Delete("/deleteComment/{idComment}")
     */
    public function deleteCommentAction(Request $request)
    {
        $serviceComment = $this->get(self::SERVICENAME);
        $serviceComment->deleteCommentaire($request->get('idComment'));


        return new JsonResponse('success');
    }


}