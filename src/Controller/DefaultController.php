<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        return $this->render('default/index0.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
    /**
     * @Route("/vnans", name="vnans")
     */
    public function index2()
    {
        return $this->render('default/index2.html.twig');
    }

    /**
     * @Route("/activite", name="activite")
     */
    public function activite()
    {
        return $this->render('default/activite.html.twig');
    }
    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil ()
    {
      return $this->render('default/index0.html.twig');
    }

}
