<?php

namespace App\Controller;

use App\Entity\CONTACT;
use App\Entity\UTILISATEUR;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

final class MessagerieController extends AbstractController
{
    #[Route('/messagerie', name: 'app_messagerie')]
    public function index(): Response
    {
        return $this->render('messagerie/index.html.twig', [
            'controller_name' => 'MessagerieController',
        ]);
    }
    #[Route('/messagerie/envoie', name: 'app_messagerie_envoie')]
    public function envoie(Request $request, EntityManagerInterface $em, SessionInterface $session): Response
    {
        $present = $session->get('id');
        if($present){
            $contact = new Contact();
            $message= $request->request->get('message');
            $contact->setMessageContact($message);
            $objet= $request->request->get('objet');
            $contact->setObjetContact($objet);
            $idUtili = $em->getRepository(UTILISATEUR::class)->findOneBy(['Identifiant' => $session->get('id')]);
            $contact->setIdutilisateurcontact($idUtili);
            $em->persist($contact); //$em->remove($article) //persist
            $em->flush();
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('messagerie/index.html.twig', [
            'controller_name' => 'MessagerieController',
        ]);
    }
     #[Route('/messagerie/message', name: 'app_messagerie_message')]
    public function message(EntityManagerInterface $em): Response
    {
        $contact = $em->getRepository(CONTACT::class)->findAll();
        return $this->render('messagerie/messagerie.html.twig', [
            'contact' => $contact,
        ]);
    }
}
