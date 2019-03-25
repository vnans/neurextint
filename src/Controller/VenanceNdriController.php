<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VenanceNdriController extends AbstractController
{
    /**
     * @Route("/venance/ndri", name="venance_ndri")
     */
    public function index()
    {
        return $this->render('venance_ndri/index.html.twig', [
            'controller_name' => 'VenanceNdriController',
        ]);
    }
}
