<?php

namespace App\Controller\Upload;

use App\Entity\Images;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[AsController]
class UploadImageController
{
    public function __invoke(Request $request): Images
    {
        $uploadedFiles = $request->files->get('file');

        if (!$uploadedFiles) {
            throw new NotFoundHttpException();
        }

        $files = new Images();
        $files->setFile($uploadedFiles);

        return $files;
    }
}
