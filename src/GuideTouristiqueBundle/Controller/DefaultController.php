<?php

namespace GuideTouristiqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /* /**
      * @Route("/")
      */
    /* public function indexAction()
     {
         $dm = $this->get('doctrine_mongodb')->getManager();
         $datas= [['nom' => 'issam' , 'num' => 6],['nom' => 'issam2' , 'num' => 7]
         ];

         $test = new Test();
         foreach($datas as $data)
         {
             $etat = new Etat($data['nom'],$data['num']);
             $dm->persist($etat);
             $dm->flush();
             $test->addEtat($etat);
         }

         $dm->persist($test);
         $dm->flush();



         return $this->render('GuideTouristiqueBundle:Default:index.html.twig');
     }
 */
}
