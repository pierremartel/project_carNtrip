<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use App\Services\ApiCitiesService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking", name="booking")
     */
    public function index(BookingRepository $bookingRepo): Response
    {

        $bookings = $bookingRepo->findAll();

        return $this->render('booking/index.html.twig', [
            'bookings' => $bookings,
        ]);
    }

    /**
     * @Route("/booking/add", name="booking_add")
     */
    public function add(Request $request, EntityManagerInterface $em, ApiCitiesService $apiService): Response
    {

        $cities = ($apiService->getCities());

        $booking = new Booking();
        date_default_timezone_set('Europe/Lisbon');

        $formBooking = $this->createForm(BookingType::class, $booking);
        $formBooking->handleRequest($request);

        if($formBooking->isSubmitted() && $formBooking->isValid()) {
            
            $booking->setPickupLocation($request->request->get('pickup_location'));
            $booking->setDropoffLocation($request->request->get('dropoff_location'));
            // dd($request);
            // dd($formBooking->getData());
            $em->persist($booking);
            $em->flush();

            $this->addFlash("success", "Votre réservation a bien été enregistrée ");

            return $this->redirectToRoute('booking');
        }

        return $this->render('booking/addBooking.html.twig', [
            'formBooking' => $formBooking->createView(),
            'cities' => $cities
        ]);
    }

    /**
     * @Route("/booking/remove/{id}", name="booking_remove", requirements={"id":"\d+"})
     */
    public function remove($id, BookingRepository $bookingRepo, EntityManagerInterface $em)
    {
        $booking = $bookingRepo->find($id);

        if(!$booking) {
            throw $this->createNotFoundException("Booking n°$id doesn't exist and cannot be delete !");
        }

        $em->remove($booking);
        $em->flush();

        $this->addFlash("success", "Votre réservation a bien été supprimé");

        return $this->redirectToRoute('booking');

    }
}
