<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     */
    public function index(UserRepository $userRepo): Response
    {
        $users = $userRepo->findAll();
        $totalUsers = count($users);

        return $this->render('customer/index.html.twig', [
            'users' => $users,
            'totalUsers' => $totalUsers
        ]);
    }
}
