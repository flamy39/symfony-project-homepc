<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant_list')]
    public function index(EtudiantRepository $etudiantRepository): Response
    {
        // Appel du modèle
        $etudiants = $etudiantRepository->findAll();

        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

    #[Route('/etudiants/{id}', name: 'app_etudiant_show')]
    public function showEtudiant(EtudiantRepository $etudiantRepository, int $id): Response
    {
        // Appel du modèle
        $etudiant = $etudiantRepository->find($id);

        return $this->render('etudiant/show.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }
}
