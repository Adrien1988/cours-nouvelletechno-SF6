<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')] // cette ligne permet de créer le chemin URL
    public function index(CategoriesRepository $categoriesRepository): Response // méthode liée à la route qui se trouve audessus et qui renvoie une réponse "RESPONSE"
    {
        return $this->render('main/index.html.twig', [
          'categories' => $categoriesRepository->findBy([],
          ['categoryOrder' => 'asc']) // asc signifie ascendant comme pour les requêtes SQL
        ]); // "render" est un racourcis TWIG vers le moteur de templates qui permet de récupérer le fichier se trouvant entre les parenthèses.
    }
}
