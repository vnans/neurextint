<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class MessageController extends AbstractController
{
  private $image;
  private $num;
  private $op1 ;
  private $op2;
  private $op3;
  private $orange;
  private $mtn ;
  private $moov ;

    /**
     * @Route("/message", name="message")
     */
    public function index()
    {
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }

    /**
     * @Route("/send", name="send")
     */
    public function rsend()
    {
      $image="message des abonnes";
      $num="47030099";


      //redirectToRoute('http://197.159.206.142/api/test/sendSMS.php?smsc=OCI&from=22547039900&key=test&msg=merci_vnans') ;
      return $this->redirect('http://197.159.206.142/api/test/sendSMS.php?smsc=OCI&from=225'.$num.'&key=test&msg='.$image.'');
     }


    /**
     * @Route("/messagesend", name="messageend")
     */
    public function send( Request $request )
    {
      $op1 ='ORANGE';
      $op2 = 'MTN';
      $op3 = 'MOOV' ;
      $EntityManager = $this->getDoctrine()->getManager(); // connexion BD


            //$dqlquery = $customerEntityManager->createQuery('SELECT v FROM App\Entity\Customer\User v');
            $orange = $EntityManager->createQuery('SELECT v.id , v.telephone FROM App\Entity\Scout v WHERE v.operateur ='.$op1.'  '); // recuperer tout les users ORANGE
          //  $mtn = $EntityManager->createQuery('SELECT v.id , v.telephone FROM App\Entity\Scout v WHERE v.operateur = '.$op2.' '); // recuperer tout les users MTN
        //    $moov = $EntityManager->createQuery('SELECT v.id , v.telephone FROM App\Entity\Scout v WHERE v.operateur = '.$op3.' '); // recuperer tout les users MOOV



            $totalorange = $EntityManager->createQuery('SELECT count(s.id)  FROM App\Entity\Scout s WHERE s.operateur ='.$op1.'');
        //    $totalmtn    = $EntityManager->createQuery('SELECT count(s.id)  FROM App\Entity\Scout s WHERE s.operateur ='.$op2.' ');
        //    $totalmoov   = $EntityManager->createQuery('SELECT count(s.id)  FROM App\Entity\Scout s WHERE s.operateur ='.$op3.'');

            $abonnesorange = $orange->getResult(); // tous les abonnes
      //      $abonnesmtn = $mtn->getResult(); // tous les abonnes
    //        $abonnesmoo = $moov->getResult(); // tous les abonnes



            $record1 = $totalorange->getResult(); // total des users
      //      $record2 = $totalmtn->getResult(); // total des users
      //      $record3 = $totalmoov->getResult(); // total des users

            $i = 0;



            // var_dump($record) ;
            ini_set('max_execution_time',0);   // temps d'execution illimité
            while ( $i < $record1 ) {
               //  var_dump($abonne[$i]["username"]) ;
             $msg= $request->request->get('form')['numero'];

                $abonne = $abonnesorange[$i]["telephone"];

                if (strlen($abonne) > 7 ) { //si c'est un N° de telephone

                    $numero=substr($abonne,-8) ; //on retire l'indicatif

                return $this->redirect('http://197.159.206.142/api/test/sendSMS.php?smsc=OCI&from=225'.$numero.'&key=test&msg='.$msg.'') ;

                }
              $i++ ;
            }
            while ( $i < $record2 ) {
               //  var_dump($abonne[$i]["username"]) ;
             $msg=$request->request->get('form')['numero'];


                $abonne2 = $abonnesmtn[$i]["telephone"];

                if (strlen($abonne2) > 7 ) { //si c'est un N° de telephone

                    $numero=substr($abonne2,-8) ; //on retire l'indicatif

                return $this->redirect('http://197.159.206.142/api/test/sendSMS.php?smsc=MTN-CI&from=225'.$numero.'&key=test&msg='.$msg.'');

                }
              $i++ ;
            }
            while ( $i < $record3 ) {
               //  var_dump($abonne[$i]["username"]) ;
             $msg=$request->request->get('form')['message'];
//              "JAMBOREE 2019 YOPOUGON: Bien à vous chers Responsables et jeunes Scouts du DAA. Le Comité d'organisation du JAMBOREE 2019 porte à votre connaissance que la Messe de Lancement de ce camp national, au sein de notre District, aura lieu le dimanche 23 juin 2019 sur la paroisse NOTRE DAME DE LA NATIVITÉ à 10H .
// Personnes conviées: Tous les chefs et jeunes Scouts du District, L'équipe régionale et le Comité national d'organisation.
// Veuillez faire large diffusion de ce message. plus d'info 47039900   COM_JAMBOREE_DAA"  ;

                $abonne3 = $abonnesmoov[$i]["telephone"];

                if (strlen($abonne3) > 7 ) { //si c'est un N° de telephone

                    $numero=substr($abonne3,-8) ; //on retire l'indicatif

                return $this->redirect('http://197.159.206.142/api/test/sendSMS.php?smsc=MOOV&from=225'.$numero.'&key=test&msg='.$msg.'');

                }
              $i++ ;
            }

        // foreach ($abonne as $abonnes) {

        // $user = new User();
        // $user->setIduser($abonnes->id);
        // $user->setUsername($abonnes->username);
        // $user->setPassword($abonnes->username);
        // $user->setEmail($abonnes->username);



        // $entityManager->persist($user);
        // $entityManager->flush();


        // }


            //$dqlquery = $entityManager->createQuery('SELECT u FROM App\Entity\User u');

        //    $offre = $dqlquery->getResult();
      //  return $this->render('default/alcalistech.html.twig',['offre' => $offre]);

      // return $this->render('default/alcalistore.html.twig',['abonne' => $abonne]);
        return $this->render('message/index.html.twig', [
            'controller_name' => 'MessageController',
        ]);
    }
}
