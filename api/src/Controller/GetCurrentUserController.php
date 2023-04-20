<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetCurrentUserController extends AbstractController
{
    #[Route('/get/current/user', name: 'app_get_current_user')]
    public function index(): Response
    {
        return $this->render('get_current_user/index.html.twig', [
            'controller_name' => 'GetCurrentUserController',
        ]);
    }
}
