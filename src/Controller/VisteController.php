<?php

namespace App\Controller;

use App\Entity\Viste;
use App\Form\VisteType;
use App\Repository\VisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/viste")
 */
class VisteController extends AbstractController
{
    /**
     * @Route("/", name="viste_index", methods="GET")
     */
    public function index(VisteRepository $visteRepository): Response
    {
        return $this->render('viste/index.html.twig', ['vistes' => $visteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="viste_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $viste = new Viste();
        $form = $this->createForm(VisteType::class, $viste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($viste);
            $em->flush();

            return $this->redirectToRoute('viste_index');
        }

        return $this->render('viste/new.html.twig', [
            'viste' => $viste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="viste_show", methods="GET")
     */
    public function show(Viste $viste): Response
    {
        return $this->render('viste/show.html.twig', ['viste' => $viste]);
    }

    /**
     * @Route("/{id}/edit", name="viste_edit", methods="GET|POST")
     */
    public function edit(Request $request, Viste $viste): Response
    {
        $form = $this->createForm(VisteType::class, $viste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('viste_index', ['id' => $viste->getId()]);
        }

        return $this->render('viste/edit.html.twig', [
            'viste' => $viste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="viste_delete", methods="DELETE")
     */
    public function delete(Request $request, Viste $viste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$viste->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($viste);
            $em->flush();
        }

        return $this->redirectToRoute('viste_index');
    }
}
