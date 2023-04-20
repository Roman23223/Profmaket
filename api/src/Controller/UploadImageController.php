<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadImageController extends AbstractController
{
    #[Route('/upload/image', name: 'app_upload_image')]
    public function index(): Response
    {
        return $this->render('upload_image/index.html.twig', [
            'controller_name' => 'UploadImageController',
        ]);
    }
}
