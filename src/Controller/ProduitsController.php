<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produits;
use App\Form\AjoutProduitsType;


class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'PRODUITS')]

   public function new(Request $request): Response {
    
    $produit = new Produits();
    $form = $this->createForm(AjoutProduitsType::class, $produit);
    $form->handleRequest($request);

    return $this->render('produits/index.html.twig', ['formProduit' => $form->createView()]);

   }
}
