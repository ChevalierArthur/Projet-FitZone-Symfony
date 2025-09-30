<?php

namespace App\Controller;

use App\Entity\UTILISATEUR;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function index(): Response
    {

        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }
    #[Route('/connexion/connect', name: 'app_connexion_connect')]
    public function connect(Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $id= $request->request->get('id');
            $mdp = $request->request->get('mdp');
            if(!$id || !$mdp){
                echo "<script>alert('login ou mot de passe non rentré');</script>";
                return $this->render('connexion/index.html.twig', [
                'controller_name' => 'ConnexionController',
                ]);
            }
            $nb = 0;
            $trouve = false;
            $mdpr = "";
            $role = "";
            $mdpr = $em->getRepository(UTILISATEUR::class)->findOneBy(['Identifiant' => $id]);
            
            if($mdpr == ""){
                echo "<script>alert('login non trouvé');</script>";
                return $this->render('connexion/index.html.twig', [
                'controller_name' => 'ConnexionController',
                ]);
            }
            else if($mdp == $mdpr->getMotDePasse()){
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['role'] = $role;
                echo "<script>alert('".$_SESSION['id']."');</script>";
                return $this->render('accueil/index.html.twig', [
                'controller_name' => 'ConnexionController',
                ]);
            }
            else{
                echo "<script>alert('Mot de passe non trouvé');</script>";
                return $this->render('connexion/index.html.twig', [
                'controller_name' => 'ConnexionController',
                ]);
            }           

        }
        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }
}
