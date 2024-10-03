<?php

namespace App\Controller;

use App\Entity\Letter;
use App\Form\LetterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LetterController extends AbstractController
{
    /**
     * @Route("/letters", name="letter_list")
     */
    public function list(EntityManagerInterface $em): Response
    {
        $letters = $em->getRepository(Letter::class)->findAll();

        return $this->render('letter/list.html.twig', [
            'letters' => $letters,
        ]);
    }

    /**
     * @Route("/letters/new", name="letter_new")
     */
    public function new(Request $request, EntityManagerInterface $em): RedirectResponse|Response
    {
        $letter = new Letter();
        $form = $this->createForm(LetterType::class, $letter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($letter);
            $em->flush();

            return $this->redirectToRoute('letter_list');
        }

        return $this->render('letter/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
