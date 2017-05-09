<?php
/**
 * Created by PhpStorm.
 * User: issaM harrazI
 * Date: 06/04/2017
 * Time: 16:13
 */

namespace GuideTouristiqueBundle\Controller\PackController;

use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PackController extends Controller
{


    const SERVICENAME = 's.pack.impmetier';

    /**
     * @Rest\Post("/addPack")
     * @param Request $request
     * @return JsonResponse
     */
    public function addPackAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $servicePack = $this->get(self::SERVICENAME);

        $pack = $servicePack->addPACK($data);

        return new JsonResponse('fff');


    }

    /**
     *
     * @Rest\Put("/updatePack")
     */
    public function updatePackAction(Request $request)
    {
        /*//     $data = json_decode($requestContent, true);$data = $requestContent;
        $serviceEtat = $this->get(self::SERVICENAME);
        $serviceEtat->updateEtat($request->getContent());
        
*/
        return new JsonResponse("sucess");
    }

    /**
     * @Rest\Delete("/deleteEtatPack/{idEtat}")
     */
    public function deleteEtatPackAction(Request $request)
    {
        /*$serviceEtat = $this->get(self::SERVICENAME);
        $serviceEtat->deleteEtat($request->get('idEtat'));
        */

        return new JsonResponse("success");
    }


    /**
     * @Rest\Get("/getAllEtatsPack")
     */
    public function getAllEtatsPackAction()
    {

        /*

                $serviceEtat = $this->get(self::SERVICENAME);
                $etats = $serviceEtat->getAllEtats();


                $etatsJson= Serialiser::serializer($etats);
                //$etatsJson = json_encode($etats);

                return new JsonResponse($etatsJson);*/

    }


    /**
     * afficher les categories des id,noms packs
     * @Rest\Get("/getEtatPack/{idEtat}")
     */
    public function getEtatPackAction(Request $request)
    {
        /* $serviceEtat = $this->get(self::SERVICENAME);
         $etat = $serviceEtat->getEtat($request->get('idEtat'));

         $etatJson= Serialiser::serializer($etat);
         return new JsonResponse($etatJson);*/
    }


    /**
     * @Route("/")
     */
    /* public function indexAction(Request $request)
     {
         $directory = __DIR__.'../../../../uploads/images/';

         $file = fopen($directory.'loading.gif', 'r');
         dump($file);
        // $x= Serialiser::serializer($file);

         $servicePack = $this->get(self::SERVICENAME);

         //$servicePack->uploadFile($uploadedFile);



         return $this->render('GuideTouristiqueBundle:Default:index.html.twig',array('x' =>'v'));
     }

     //   $id="3";
     //  $serviceEtat = $this->get('s.etat.impmetier');

     // $serviceEtat->deleteEtat($id);
     //    $etatsJson = $serviceEtat->getAllEtats();

     //$serviceEtat = $this->get('s.etat.impmetier');

     //    $serviceEtat = $this->get(self::SERVICENAME);

     /*        $data= [

                 'nom' => 'blahblah',
                 'num' => 4
             ];


          /*   $offre = ['id' =>'12','nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];
             $ficheTechnique = ['description' => 'le client s de so etablissemet'];
             $cpackFicheTechnique = ['offre' => $offre , 'ficheTechnique' => $ficheTechnique,'num' => 1];
     */


///////////////////pack image//////////////////
    /*

            $images = [["alt" => "aliexpress.png","file" => $img,"name" => "aliexpress.png","type" => "image/png","size" =>123123]

            ];


            $offreMedia = ['id' =>'1','nbre_media' => 10 ,'nom' => 'issam', 'description' => 'issam', 'prix' => 1.5, 'duree' => 123];

            $cpackImage = ["offre" => $offreMedia , "images" => $images,"num"=> 2];





            /////////////cpack video////////////////

      /*     $videos = [["video" => $upload->getPathname(),"videoName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()],
               ["video" => $upload->getPathname(),"videoName" => $upload->getClientOriginalName(),"mimeType" => $upload->getClientMimeType()]
           ];

           $cpackVideo = ['offreMedia' => $offreMedia , 'videos' => $videos];
    */


    /////////////////////////////////
    /*$data['pack']=[];

           $data['pack'] = ['cpackImage' => $cpackImage];








            $servicePack = $this->get(self::SERVICENAME);

            $servicePack->addPACK($data);
           // $serviceEtat->updateEtat($data);
          // $serviceEtat->addEtat($data);
          // $etatsJson = $serviceEtat->getAllEtats();

         // dump($etatsJson);
         //   $serviceEtat = $this->get(self::SERVICENAME);
       //   $serviceEtat->deleteEtat($id);

       //     $etatsJson = $serviceEtat->getAllEtats();
           // $serviceEtat->updateEtat($data);

         //   dump($etatsJson);
            return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
        }

    //,array('form' => +
    //
    //
    //
    //
    //$form->createView())


    */
}
