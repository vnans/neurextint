<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChannelController extends AbstractController
{
    /**
     * @Route("/channel", name="channel")
     */
    public function index()
    {
        return $this->render('channel/index.html.twig', [
            'controller_name' => 'ChannelController',
        ]);
    }
}
