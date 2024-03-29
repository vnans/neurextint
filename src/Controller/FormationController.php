<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\guessExtension;

/**
 * @Route("/formation")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/", name="formation_index", methods="GET")
     */
    public function index(FormationRepository $formationRepository): Response
    {
        return $this->render('formation/index.html.twig', ['formations' => $formationRepository->findAll()]);
    }


    /**
     * @Route("/admin", name="formation_indexadmin", methods="GET")
     */
    public function indexadmin(FormationRepository $formationRepository): Response
    {
        return $this->render('formation/indexadmin.html.twig', ['formations' => $formationRepository->findAll()]);
    }



    /**
     * @Route("/new", name="formation_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ajouter d'image
            $file = $formation->getImage();
            $file1 = $formation->getPlaquette();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $fileName1 = $this->generateUniqueFileName() . '.' . $file1->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName); // stock image dans /public/img
            $file1->move($this->getParameter('images_directory'), $fileName1); // stock image dans /public/img


            $formation->setImage($fileName);
            $formation->setPlaquette($fileName1);




            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();

            return $this->redirectToRoute('formation_indexadmin');
        }

        return $this->render('formation/new.html.twig', [
            'formation' => $formation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formation_show", methods="GET")
     */
    public function show(Formation $formation): Response
    {
        return $this->render('formation/show.html.twig', ['formation' => $formation]);
    }

    /**
     * @Route("/{id}/edit", name="formation_edit", methods="GET|POST")
     */
    public function edit(Request $request, Formation $formation): Response
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // modifier image et formations
            $file = $formation->getImage();
            $file1 = $formation->getPlaquette();


            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $fileName1 = $this->generateUniqueFileName() . '.' . $file1->guessExtension();

            // moves the file to the directory where brochures are stored
            $file->move($this->getParameter('images_directory'), $fileName); // stock image dans /public/img
            $file1->move($this->getParameter('images_directory'), $fileName1); // stock fichier dans /public/img

            $formation->setImage($fileName);
            $formation->setPlaquette($fileName1);

            $this->getDoctrine()->getManager()->flush();

            #  return $this->redirectToRoute('formation_index', ['id' => $formation->getId()]);
            return $this->redirectToRoute('formation_indexadmin', ['id' => $formation->getId()]);
        }

        return $this->render('formation/edit.html.twig', [
            'formation' => $formation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formation_delete", methods="DELETE")
     */
    public function delete(Request $request, Formation $formation): Response
    {
        if ($this->isCsrfTokenValid('delete' . $formation->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($formation);
            $em->flush();
        }

        return $this->redirectToRoute('formation_index');
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
}
