<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cars;


class CarController extends AbstractController
{
    /**
     * @Route("/car/ajouter", name="ajouter_car")
     */
    public function AjoutPage(): Response
    {
        return $this->render('car/Ajouter.html.twig', [
            'controller_name' => 'CarController',
        ]);
    }
        /**
     * @Route("/car/ajout", name="ajout_car")
     */
    public function Ajouter(Request $request): Response
    {
        $cars = new Cars();

        $matricule = $request->request->get('matricule');
        $marque = $request->request->get('marque');
        $couleur = $request->request->get('couleur');
        $carburant = $request->request->get('carburant');
        $nbrPlace = $request->request->get('nbrPlace');
        $description = $request->request->get('description');
        $Disponibilite = $request->request->get('disponibilite');
        $Date = $request->request->get('datemiseencirculation');
        //$idAgence = $request->request->get('idAgence');

        $cars->setMatricule($matricule);
        $cars->setMarque($marque);
        $cars->setCouleur($couleur);
        $cars->setCarburant($carburant);
        $cars->setNbrPlaces($nbrPlace);
        $cars->setDescription($description);
        $cars->setDisponibilite($Disponibilite);
        $cars->setDatemiseencirculation($Date);
        //$cars->setIdAgence($idAgence);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cars);
        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }
     /**
     * @Route("/car/consulter/{id}", name="consulter_car")
     */
    public function Consulter($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $car = $entityManager->getRepository(Cars::class)->find($id);
        return $this->render('car/Consulter.html.twig', [
            'car' => $car,
        ]);
    }
       /**
     * @Route("/car/modifier/{id}", name="modifier_car")
     */
    public function ModifierPage($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $car = $entityManager->getRepository(Cars::class)->find($id);
        return $this->render('car/Modifier.html.twig', [
            'car' => $car,
        ]);
    }
     /**
     * @Route("/car/edit/{id}", name="edit_car")
     */
    public function Modifier(Request $request,$id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $car = $entityManager->getRepository(Cars::class)->find($id);

        $matricule = $request->request->get('matricule');
        $marque = $request->request->get('marque');
        $couleur = $request->request->get('couleur');
        $carburant = $request->request->get('carburant');
        $nbrPlace = $request->request->get('nbrPlace');
        $description = $request->request->get('description');
        $Disponibilite = $request->request->get('disponibilite');
        $Date = $request->request->get('datemiseencirculation');
       // $idAgence = $request->request->get('idAgence');

        $car->setMatricule($matricule);
        $car->setMarque($marque);
        $car->setCouleur($couleur);
        $car->setCarburant($carburant);
        $car->setNbrPlaces($nbrPlace);
        $car->setDescription($description);
        $car->setDisponibilite($Disponibilite);
        $car->setDatemiseencirculation($Date);
     //   $car->setIdAgence($idAgence);

        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }
      /**
     * @Route("/car/supprimer/{id}", name="supprimer_car")
     */
    public function supprimer($id): Response
  {
    $entityManager = $this->getDoctrine()->getManager();
    $car = $entityManager->getRepository(Cars::class)->find($id);
    $entityManager->remove($car);
    $entityManager->flush();
      return $this->redirectToRoute('admin');
  }
}
