<?php

namespace App\Controller;

use App\Entity\AVIS;
use App\Entity\UTILISATEUR;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis')]
    public function index(EntityManagerInterface $em): Response
    {
        $avis = $em->getRepository(AVIS::class)->findAll();
        return $this->render('avis/index.html.twig', [
            'avis' => $avis,
        ]);
    }
    #[Route('/avis/form', name: 'app_avis_form')]
    public function form(): Response
    {
        return $this->render('avis/form.html.twig', [
        ]);
    }
    #[Route('/avis/poster', name: 'app_avis_poster')]
    public function poster(Request $request, EntityManagerInterface $em): Response
    { 
        $commentaire = $request->request->get('commentaire');
        $user = $this->getUser();
        $identifiant = $user->getUserIdentifier();
        if($identifiant && $commentaire){
        $id = $em->getRepository(UTILISATEUR::class)->findOneBy(['Identifiant' =>$identifiant]);
        $avis = new avis();
        $avis->setIdUtilisateurAvis($id);
        $avis->setMessageavis($commentaire);
        $em->persist($avis); //$em->remove($article) //persist
        $em->flush();
        return $this->redirectToRoute('app_avis');
    }
        return $this->redirectToRoute('app_avis_form');
    }
}
