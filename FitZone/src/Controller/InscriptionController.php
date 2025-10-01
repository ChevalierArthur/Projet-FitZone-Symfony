<?php

namespace App\Controller;

use App\Entity\UTILISATEUR;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
    #[Route('/inscription/ins', name: 'app_inscription_ins')]
    public function ins(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $id= $request->request->get('id');
            $mdp = $request->request->get('mdp');
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $mail = $request->request->get('mail');
            $tel = $request->request->get('tel');
            $admin = 0;
            $verif = $em->getRepository(UTILISATEUR::class)->findOneBy(['Identifiant' => $id]);
            if($verif){
                echo "<script>alert('Identifiant déjà existant');</script>";
                return $this->redirectToRoute('app_inscription');
            }
            // tu peux ajouter des vérifications ici (valeur vide, sécurité, etc.)
            if ($id && $mdp && $nom && $prenom && $mail && $tel) {
                $utilisateur = new utilisateur();
                $utilisateur->setIdentifiant($id);
                $utilisateur->setMotDePasse($mdp);
                $utilisateur->setNom($nom);
                $utilisateur->setPrenom($prenom);
                $utilisateur->setEmail($mail);
                $utilisateur->setNumTel($mdp);
                $utilisateur->setEstAdmin($admin);

                $em->persist($utilisateur); //$em->remove($article) //persist
                $em->flush();

                return $this->redirectToRoute('app_connexion');
            }
            echo "<script>alert('Vous n'avez pas remplis tout les cases');</script>";
            return $this->redirectToRoute('app_inscription');
        }
        echo "<script>alert('pas POST');</script>";
        return $this->redirectToRoute('app_inscription');
    }
}
