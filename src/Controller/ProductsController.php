<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/produits', name: 'products_')]
class ProductsController extends AbstractController // AbstractController amène une fonction interessante qui est l'injection de dépendance
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')] // attributs de la route ici /slug est mis entre acollades {} afin d'indiquer que c'est une propriété variable.
    public function details(Products $product): Response // pour bénéficier de l'injection de dépendances de l'AbstractController il faut mettre dans les paramètres de la function les éléments nécessaires pour que Abstract aille les récupérer.
    {

        return $this->render('products/details.html.twig', [ // nous pouvons aussi utiliser à la place de la ligne ci-dessous celle-ci "compact('product') qui va prendre le $product et créer un tableau associatif
            'product' => $product
        ]); // pour récupérer les méthodes correspondant aux entités que vous souhaitez afficher il faut intégrer dans le render à la suite du chemin vers la vue, un paramètre sous forme de tableau [] qui contient la classe et la variable dans laquelle on l'intègre
    }
}
