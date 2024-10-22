<?php

namespace App\Controller;

use App\Form\InscriptionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function form(Request $request): Response
    {
        // Utilisation d'InscriptionType pour créer le formulaire
        $form = $this->createForm(InscriptionType::class);

        // Gestion de la requête du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez les données du formulaire ici, par exemple :
            // $data = $form->getData();

            // Redirection après soumission
            return $this->redirectToRoute('app_home');
        }

        // Rendu du template avec la vue du formulaire
        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/home/index', name: 'app_home_index')]
    public function index(): Response
    {
        // Rendu du template pour la méthode index
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
