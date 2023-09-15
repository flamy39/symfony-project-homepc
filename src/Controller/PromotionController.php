<?php

namespace App\Controller;

use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    #[Route('/promotions', name: 'app_promotion_list')]
    public function index(PromotionRepository $promotionRepository): Response
    {
        // Appel du modèle
        $promotions = $promotionRepository->findAll();

        return $this->render('promotion/index.html.twig', [
            'promotions' => $promotions
        ]);
    }
    #[Route('/promotions/{id}', name: 'app_promotion_show',requirements: ['id' => '\d+'])]
    public function show(PromotionRepository $promotionRepository, int $id): Response
    {
        // Appel du modèle
        $promotion = $promotionRepository->find($id);

        return $this->render('promotion/show.html.twig', [
            'promotion' => $promotion
        ]);
    }
    #[Route('/promotions/effectifs', name: 'app_promotion_effectifs_list')]
    public function listEffectifs(PromotionRepository $promotionRepository): Response
    {
        // Appel du modèle
        $effectifs = $promotionRepository->findEffectifs();

        // Construction des data pour le graphique
        $data = "";
        foreach ($effectifs as $effectif) {
            $data .= '{y: '. $effectif['effectifs'] . ', label: "' . $effectif['nom'] . '"},';
        }
        $data = substr($data, 0, -1);
        // Appel de la vue
        return $this->render('promotion/list_effectifs.html.twig',[
            'effectifs' => $effectifs,
            'data' => $data
        ]);

    }


}
