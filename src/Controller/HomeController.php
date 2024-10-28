<?php

namespace App\Controller;

use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Rendu du template pour la page d'accueil
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/home', name: 'app_home_form')]
    public function form(Request $request): Response
    {
        // Création du formulaire
        $form = $this->createForm(InscriptionType::class);
        $form->handleRequest($request);

        // Vérification si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez les données du formulaire ici

            // Redirection après soumission (optionnelle)
            return $this->redirectToRoute('app_home');
        }

        // Rendu du formulaire
        return $this->render('home/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
