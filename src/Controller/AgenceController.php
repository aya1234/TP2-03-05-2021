<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Agence;

class AgenceController extends AbstractController
{

    /**
     * @Route("/agence/ajouter", name="ajouter_agence")
     */
    public function AjoutPage(): Response
    {
        return $this->render('agence/Ajouter.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }
        /**
     * @Route("/agence/ajout", name="ajout_agence")
     */
    public function Ajouter(Request $request): Response
    {
        $agence = new Agence();

        $nom = $request->request->get('nom');
        $telagence = $request->request->get('telagence');
        $adrville = $request->request->get('adrville');

        $agence->setNom($nom);
        $agence->setTelagence($telagence);
        $agence->setAdresseville($adrville);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($agence);
        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }
     /**
     * @Route("/agence/consulter/{id}", name="consulter_agence")
     */
    public function Consulter($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $agence = $entityManager->getRepository(Agence::class)->find($id);
        return $this->render('agence/Consulter.html.twig', [
            'agence' => $agence,
        ]);
    }
     /**
     * @Route("/agence/modifier/{id}", name="modifier_agence")
     */
    public function ModifierPage($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $agence = $entityManager->getRepository(Agence::class)->find($id);
        return $this->render('agence/Modifier.html.twig', [
            'agence' => $agence,
        ]);
    }
     /**
     * @Route("/agence/edit/{id}", name="edit_agence")
     */
    public function Modifier(Request $request,$id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $agence = $entityManager->getRepository(Agence::class)->find($id);

        $nom = $request->request->get('nom');
        $telagence = $request->request->get('telagence');
        $adrville = $request->request->get('adrville');

        $agence->setNom($nom);
        $agence->setTelagence($telagence);
        $agence->setAdresseville($adrville);

        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }
    /**
     * @Route("/agence/supprimer/{id}", name="supprimer_agence")
     */
    public function supprimer($id): Response
  {
    $entityManager = $this->getDoctrine()->getManager();
    $agence = $entityManager->getRepository(Agence::class)->find($id);
    $entityManager->remove($agence);
    $entityManager->flush();
      return $this->redirectToRoute('admin');
  }
}
