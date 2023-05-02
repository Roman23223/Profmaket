<?php

namespace App\Controller\Upload;

use ApiPlatform\Api\IriConverterInterface;
use App\Entity\Images;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[AsController]
class UploadImageController
{
    public function __construct(private IriConverterInterface $iriConverter) {}

    public function __invoke(Request $request): Images
    {
        $uploadedFiles = $request->files->get('file');
        $iriWorks = $request->request->get('works');

        if (!$iriWorks){

            if (!$uploadedFiles) {
                throw new NotFoundHttpException();
            }

            $files = new Images();
            $files->setFile($uploadedFiles);

            return $files;
        }

        $works = $this->iriConverter->getResourceFromIri($iriWorks);

        if (!$uploadedFiles) {
            throw new NotFoundHttpException();
        }


        $files = new Images();
        $files->setFile($uploadedFiles);
        $files->setWorks($works);

        return $files;
    }
}
