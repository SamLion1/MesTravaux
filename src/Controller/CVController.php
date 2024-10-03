<?php

namespace App\Controller;

use App\Entity\CV;
use App\Form\CVType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    /**
     * @Route("/cv", name="cv_list")
     */
    public function list(EntityManagerInterface $em): Response
    {
        $cvs = $em->getRepository(CV::class)->findAll();

        return $this->render('cv/list.html.twig', [
            'cvs' => $cvs,
        ]);
    }

    /**
     * @Route("/cv/new", name="cv_new")
     */
    public function new(Request $request, EntityManagerInterface $em): RedirectResponse|Response
    {
        $cv = new CV();
        $form = $this->createForm(CVType::class, $cv);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($cv);
            $em->flush();

            return $this->redirectToRoute('cv_list');
        }

        return $this->render('cv/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
