<?php

namespace App\Controller;

use App\Entity\PRESENTATION;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/presentation/modification', name: 'app_presentation_modification')]
    public function modifi(EntityManagerInterface $em): Response
    {
        $presentation = $em->getRepository(PRESENTATION::class)->findOneBy(['id' => 1]);
        return $this->render('presentation/modifierPresentation.html.twig', [
            'presentation' => $presentation,
        ]);
    }
    #[Route('/presentation/modifier', name: 'app_presentation_modifier')]
    public function modifier(Request $request, EntityManagerInterface $em): Response
    {
        echo $request->request->get('intro');
        $intro = $request->request->get('intro');
        $text = $request->request->get('text');
        $image = $request->request->get('image');
        $presentation = $em->getRepository(PRESENTATION::class)->findOneBy(['id' => 1]);
        $presentation->setIntroduction($intro);
        $presentation->setTexte($text);
        $presentation->setPhoto($image);
        $em->persist($presentation); //$em->remove($article) //persist
        $em->flush();
        return $this->redirectToRoute('app_accueil');
    }
}
