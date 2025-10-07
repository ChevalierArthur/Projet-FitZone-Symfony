<?php

namespace App\Controller;

use App\Entity\INFORMATION;
use App\Repository\INFORMATIONRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ModifaccueilController extends AbstractController
{
    #[Route('/modifaccueil', name: 'app_modifaccueil')]
    public function information(INFORMATIONRepository $info): Response
    {
        $information = [$info->find(1)];
        return $this->render('modifaccueil/index.html.twig', [
            'informations' => $information[0],
        ]);
    }
#[Route('/modifier-texte', name: 'app_modifier_texte', methods: ['POST'])]
public function modifierTexte(Request $request, INFORMATIONRepository $infoRepo, EntityManagerInterface $entityManager): Response
{
    if (!$this->isGranted('ROLE_ADMIN')) {
        throw $this->createAccessDeniedException();
    }

    $nouveauTexte = $request->request->get('text_accueil');
    $information = $infoRepo->find(1);
    $information->setTextAccueil($nouveauTexte);
    $entityManager->persist($information);
    $entityManager->flush();

    $this->addFlash('success', 'Texte modifié avec succès !');
    return $this->redirectToRoute('app_accueil');
}
}
