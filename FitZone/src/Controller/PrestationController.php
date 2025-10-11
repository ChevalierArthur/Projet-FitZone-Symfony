<?php

namespace App\Controller;

use App\Entity\PRESTATION;
use App\Repository\PRESTATIONRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
final class PrestationController extends AbstractController
{
    #[Route('/prestation', name: 'app_prestation')]
    public function index(PRESTATIONRepository $repository): Response
    {
        $prestations = $repository->findAll();

        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
        ]);
    }
        #[Route('/prestation/modif', name: 'app_prestation_modifier')]
    public function info(PRESTATIONRepository $repository): Response
    {
        $prestations = $repository->findAll();

        return $this->render('prestation/modifier.html.twig', [
            'prestations' => $prestations,
        ]);
    }
        #[Route('/prestation/ajout', name: 'app_prestation_ajout')]
    public function ajout(PRESTATIONRepository $repository): Response
    {
        $prestations = $repository->findAll();

        return $this->render('prestation/ajouter.html.twig', [
            'prestations' => $prestations,
        ]);
    }
    #[Route('/prestation/ajouter', name: 'app_prestation_ajouter', methods: ['POST'])]
    public function ajouter(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestation = new PRESTATION();
        $prestation->setTitrePresta($request->request->get('titre'));
        $prestation->setDescriptionPresta($request->request->get('description'));
        $prestation->setPrix(floatval($request->request->get('prix')));
    
        $entityManager->persist($prestation);
        $entityManager->flush();

        return $this->redirectToRoute('app_prestation');
    }

    #[Route('/prestation/modifier', name: 'modifier_prestation', methods: ['POST'])]
    public function modifier(Request $request, PRESTATIONRepository $repository, EntityManagerInterface $entityManager): Response {
        $id = $request->request->get('id');
        $prestation = $repository->find($id);
        
        if ($prestation) {
            $prestation->setTitrePresta($request->request->get('titre'));
            $prestation->setDescriptionPresta($request->request->get('description'));
            $prestation->setPrix(floatval($request->request->get('prix')));

            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prestation');
    }
#[Route('/prestation/supprimer/{id}', name: 'supprimer_prestation', methods: ['POST'])]
public function supprimerPrestation(int $id, EntityManagerInterface $entityManager): Response
{
    $prestation = $entityManager->getRepository(Prestation::class)->find($id);
    
    if (!$prestation) {
        throw $this->createNotFoundException('Prestation non trouvée');
    }

    $entityManager->remove($prestation);
    $entityManager->flush();

    $this->addFlash('success', 'Prestation supprimée avec succès');
    return $this->redirectToRoute('app_prestation');
}
}
