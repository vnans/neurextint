<?php

namespace App\Controller;

use App\Entity\Pos1;
use App\Form\Pos1Type;
use App\Repository\Pos1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pos1")
 */
class Pos1Controller extends AbstractController
{
    /**
     * @Route("/", name="pos1_index", methods="GET")
     */
    public function index(Pos1Repository $pos1Repository): Response
    {
        return $this->render('pos1/index.html.twig', ['pos1s' => $pos1Repository->findAll()]);
    }

    /**
     * @Route("/new", name="pos1_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $pos1 = new Pos1();
        $form = $this->createForm(Pos1Type::class, $pos1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pos1);
            $em->flush();

            return $this->redirectToRoute('pos1_index');
        }

        return $this->render('pos1/new.html.twig', [
            'pos1' => $pos1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pos1_show", methods="GET")
     */
    public function show(Pos1 $pos1): Response
    {
        return $this->render('pos1/show.html.twig', ['pos1' => $pos1]);
    }

    /**
     * @Route("/{id}/edit", name="pos1_edit", methods="GET|POST")
     */
    public function edit(Request $request, Pos1 $pos1): Response
    {
        $form = $this->createForm(Pos1Type::class, $pos1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pos1_index', ['id' => $pos1->getId()]);
        }

        return $this->render('pos1/edit.html.twig', [
            'pos1' => $pos1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pos1_delete", methods="DELETE")
     */
    public function delete(Request $request, Pos1 $pos1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pos1->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pos1);
            $em->flush();
        }

        return $this->redirectToRoute('pos1_index');
    }
}
