<?php

namespace App\Controller;

use App\Repository\INFORMATIONRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function information(INFORMATIONRepository $info): Response
    {
        $information = [$info->find(1)];
        return $this->render('accueil/index.html.twig', [
            'informations' => $information[0],
        ]);
    }
}
