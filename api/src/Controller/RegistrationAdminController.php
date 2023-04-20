<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationAdminController extends AbstractController
{
    #[Route('/registration/admin', name: 'app_registration_admin')]
    public function index(): Response
    {
        return $this->render('registration_admin/index.html.twig', [
            'controller_name' => 'RegistrationAdminController',
        ]);
    }
}
