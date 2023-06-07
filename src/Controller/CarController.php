<?php

namespace App\Controller;

use App\Entity\Car;
use App\Form\CarType;
use App\Repository\CarRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/car", name="car")
     */
    public function index(CarRepository $carRepo): Response
    {

        $cars = $carRepo->findAll();
        $total = count($cars);

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'total' => $total
        ]);
    }


    /**
     * @Route("/car/add", name="car_add")
     */
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $car = new Car();
        date_default_timezone_set('Europe/Lisbon');

        $formCar = $this->createForm(CarType::class, $car);

        $formCar->handleRequest($request);

        if($formCar->isSubmitted() && $formCar->isValid()) {
            $car->setArrivalAt(new DateTimeImmutable() );
            $car->setStatus(true);

            $em->persist($car);
            $em->flush();

            $this->addFlash("success", "Votre produit a bien été ajouté");

            return $this->redirectToRoute('car');
        }


        return $this->render('car/addCar.html.twig', [
            'formCar' => $formCar->createView(),
        ]);
    }


    /**
     * @Route("/car/update/{id}", name="car_update", requirements={"id":"\d+"})
     */
    public function update($id, CarRepository $carRepo, Request $request, EntityManagerInterface $em): Response
    {
        $car = $carRepo->find($id);
        if(!$car) {
            throw $this->createNotFoundException("Product $id doesn't exist and cannot be modified !");
        }

        $formCar = $this->createForm(CarType::class, $car);
        $formCar->handleRequest($request);

        if($formCar->isSubmitted() && $formCar->isValid()) {
            $em->flush();

            $this->addFlash("success", "Le produit a bien été modifié");
            return $this->redirectToRoute('car');
        }

        return $this->render('car/updateCar.html.twig', [
            'formCar' => $formCar->createView(),
        ]);
    }


    /**
     * @Route("/car/remove/{id}", name="car_remove", requirements={"id":"\d+"})
     */
    public function remove($id, CarRepository $carRepo, EntityManagerInterface $em)
    {
        $car = $carRepo->find($id);

        if(!$car) {
            throw $this->createNotFoundException("Product $id doesn't exist and cannot be delete !");
        }

        $em->remove($car);
        $em->flush();

        $this->addFlash("success", "Votre produit a bien été supprimé");

        return $this->redirectToRoute('car');
    }
}
