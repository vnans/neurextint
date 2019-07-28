<?php

namespace App\Controller;

use App\Entity\Biographie;
use App\Form\BiographieType;
use App\Repository\BiographieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/biographie")
 */
class BiographieController extends AbstractController
{
    /**
     * @Route("/", name="biographie_index", methods="GET")
     */
    public function index(BiographieRepository $biographieRepository): Response
    {
        return $this->render('biographie/index.html.twig', ['biographies' => $biographieRepository->findAll()]);
    }

    /**
     * @Route("/new", name="biographie_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $biographie = new Biographie();
        $form = $this->createForm(BiographieType::class, $biographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($biographie);
            $em->flush();

            return $this->redirectToRoute('biographie_index');
        }

        return $this->render('biographie/new.html.twig', [
            'biographie' => $biographie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="biographie_show", methods="GET")
     */
    public function show(Biographie $biographie): Response
    {
        return $this->render('biographie/show.html.twig', ['biographie' => $biographie]);
    }

    /**
     * @Route("/{id}/edit", name="biographie_edit", methods="GET|POST")
     */
    public function edit(Request $request, Biographie $biographie): Response
    {
        $form = $this->createForm(BiographieType::class, $biographie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('biographie_index', ['id' => $biographie->getId()]);
        }

        return $this->render('biographie/edit.html.twig', [
            'biographie' => $biographie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="biographie_delete", methods="DELETE")
     */
    public function delete(Request $request, Biographie $biographie): Response
    {
        if ($this->isCsrfTokenValid('delete'.$biographie->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($biographie);
            $em->flush();
        }

        return $this->redirectToRoute('biographie_index');
    }
}
