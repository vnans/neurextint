<?php

namespace App\Controller;

use App\Entity\Scout;
use App\Form\ScoutType;
use App\Repository\ScoutRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scout")
 */
class ScoutController extends AbstractController
{
    /**
     * @Route("/", name="scout_index", methods="GET")
     */
    public function index(ScoutRepository $scoutRepository): Response
    {
        return $this->render('scout/index.html.twig', ['scouts' => $scoutRepository->findAll()]);
    }

    /**
     * @Route("/new", name="scout_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $scout = new Scout();
        $form = $this->createForm(ScoutType::class, $scout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($scout);
            $em->flush();

            return $this->redirectToRoute('scout_index');
        }

        return $this->render('scout/new.html.twig', [
            'scout' => $scout,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scout_show", methods="GET")
     */
    public function show(Scout $scout): Response
    {
        return $this->render('scout/show.html.twig', ['scout' => $scout]);
    }

    /**
     * @Route("/{id}/edit", name="scout_edit", methods="GET|POST")
     */
    public function edit(Request $request, Scout $scout): Response
    {
        $form = $this->createForm(ScoutType::class, $scout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('scout_index', ['id' => $scout->getId()]);
        }

        return $this->render('scout/edit.html.twig', [
            'scout' => $scout,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="scout_delete", methods="DELETE")
     */
    public function delete(Request $request, Scout $scout): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scout->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($scout);
            $em->flush();
        }

        return $this->redirectToRoute('scout_index');
    }
}
