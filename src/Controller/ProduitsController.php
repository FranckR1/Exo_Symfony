<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produits;
use App\Form\AjoutProduitsType;


class ProduitsController extends AbstractController
{
    #[Route('/produits', name: 'app_produits')]

   public function new(Request $request, ManagerRegistry $doctrine): Response {
    
    $produit = new Produits();
    $form = $this->createForm(AjoutProduitsType::class, $produit);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()){
        $produit = $form->getData();
        $entityManager = $doctrine->getManager();
        $entityManager->persist($produit);
        $entityManager->flush();
    }

    return $this->render('produits/index.html.twig', ['formProduit' => $form->createView()]);

   }
}
