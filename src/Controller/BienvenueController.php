<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienvenueController extends AbstractController
{
    #[Route('/bienvenue/{prenom}', name: 'app_bienvenue_prenom')]
    public function bienvenuePrenom(string $prenom): Response
    {
        //dd("Appel de la méthode bienvenuePrenom");
        return $this->render('bienvenue/index.html.twig', [
            'prenom' => $prenom
        ]);
    }

    #[Route('/bienvenue', name: 'app_bienvenue')]
    public function index(): Response
    {
        //dd("Appel de la méthode index");
        return $this->render('bienvenue/index.html.twig');
    }

    #[Route('/bienvenues', name: 'app_bienvenues')]
    public function bienvenues(): Response
    {
        $personnes = ['Jean', 'Marc', 'Pierre', 'Paul'];
        //dd($personnes);
        return $this->render('bienvenue/bienvenue_tous.html.twig', [
            'personnes' => $personnes
        ]);
   }
}
