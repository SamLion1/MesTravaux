<?php

namespace App\Controller;

use App\Form\Inscription;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // Ajoute cette ligne
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function form(Request $request): Response
    {
        $form = $this->createForm(Inscription::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traite les données du formulaire ici

            // Redirige ou fais autre chose
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(), // Passe la vue du formulaire au template
        ]);
    }

    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
