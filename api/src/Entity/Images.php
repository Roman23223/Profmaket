<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\Upload\UploadImageController;
use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
#[ApiResource(
    shortName: 'Images',
    operations: [
        new Post(controller: UploadImageController::class, deserialize: false),
        new GetCollection(),
        new Get(),
        new Put(),
        new Delete(),
    ],
)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    private ?string $path = null;

    #[ORM\Column(length: 255)]
    private ?File $file = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Works $works = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getWorks(): ?Works
    {
        return $this->works;
    }

    public function setWorks(?Works $works): self
    {
        $this->works = $works;

        return $this;
    }
}
