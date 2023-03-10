<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'profile_')] // permet grâce à cette route de pouvoir accéder à toutes les méthodes de mon controller.
class ProfileController extends AbstractController
{
    #[Route('/', name: 'index')] // une route a une méthode et chaque méthode affichera une page.
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
        ]);
    }
}
