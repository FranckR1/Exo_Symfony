<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(ProduitsRepository $produitsRepository): Response
    {

        $produits = $produitsRepository->findAll();


        return $this->render('base.html.twig', [
            'controller_name' => 'HomePageController',
            'produits' => $produits,
        ]);
    }
}
