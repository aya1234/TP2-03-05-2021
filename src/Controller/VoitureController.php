<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture/ajouter", name="ajouter_voiture")
     */
    public function ajouter(): Response
    {
        return $this->render('voiture/Ajouter.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
     /**
     * @Route("/voiture/modifier", name="modifier_voiture")
     */
    public function modifier(): Response
    {
        return $this->render('voiture/Modifier.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
     /**
     * @Route("/voiture/consulter/{marque}", name="voiture")
     */
    public function consulter($marque): Response
    {
        return $this->render('voiture/Ajouter.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
}
