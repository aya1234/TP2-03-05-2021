<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Agence;
use App\Entity\Cars;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // $agence = array(
        //     "1" => array(
        //         'id' => 1,
        //         'nom' => 'AyaAgence',
        //         'telAgence' => 53113668,
        //         'adresseVille' => 'Bizerte'),
        //     "2" => array(
        //         'id' => 2,
        //         'nom' => 'AyaAgence',
        //         'telAgence' => 53113668,
        //         'adresseVille' => 'Bizerte'),
        //     "3" => array(
        //         'id' => 3,
        //         'nom' => 'AyaAgence',
        //         'telAgence' => 53113668,
        //         'adresseVille' => 'Bizerte'    
        //     ),  
      //  );
        $voiture = array(
            "BMW" => array(
                'Marque' => 'BMW',
                'Couleur' => 'Rouge',
                'Description' => '..',
                'Nombredeplace' => 2 ,
                'NomAgence' => 'AgenceAya'),
            "Golf" => array(
                'Marque' => 'Golf',
                'Couleur' => 'Rouge',
                'Description' => '..',
                'Nombredeplace' => 2 ,
                'NomAgence' => 'AgenceAya'),
            "Mercedes" => array(
                'Marque' => 'Mercedes',
                'Couleur' => 'Rouge',
                'Description' => '..',
                'Nombredeplace' => 5 ,
                'NomAgence' => 'AgenceAya'    
            ),  
        );
        $entityManager = $this->getDoctrine()->getManager();
        $agence = $entityManager->getRepository(Agence::class)->findAll();
        $car = $entityManager->getRepository(Cars::class)->findAll();
        return $this->render('admin/index.html.twig', [
            'agences' => $agence,
            'voitures' => $voiture,
            'cars' => $car,
        ]);
    }
}
