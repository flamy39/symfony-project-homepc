<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant_list')]
    public function index(EtudiantRepository $etudiantRepository, PaginatorInterface $paginator, Request $request): Response
    {
        // Appel du modèle
        // Méthode 1
//        $etudiants = $paginator->paginate(
//            $etudiantRepository->findAll(),
//            $request->query->getInt('page', 1),
//            10
//        );

        // Méthode 2
        $query = $etudiantRepository->findAllQuery();
        $etudiants = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }


    #[Route('/etudiants/{id}', name: 'app_etudiant_show', requirements: ['id' => '\d+'])]
    public function show(EtudiantRepository $etudiantRepository, int $id): Response
    {
        // Appel du modèle
        $etudiant = $etudiantRepository->find($id);

        return $this->render('etudiant/show.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }

    #[Route('/etudiants/mineurs', name: 'app_etudiant_mineurs_list')]
    public function listMineurs(EtudiantRepository $etudiantRepository): Response
    {
        // Appel du modèle
        $etudiants = $etudiantRepository->findMineurs();
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

}
