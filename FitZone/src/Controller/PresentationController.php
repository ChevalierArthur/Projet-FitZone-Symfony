<?php

namespace App\Controller;

use App\Entity\PRESENTATION;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PresentationController extends AbstractController
{
    #[Route('/presentation', name: 'app_presentation')]
    public function index(EntityManagerInterface $em): Response
    {
        $presentation = $em->getRepository(PRESENTATION::class)->findOneBy(['id' => 1]);
        return $this->render('presentation/index.html.twig', [
            'presentation' => $presentation,
        ]);
    }
}
