<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\Upload\UploadImageController;
use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

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
    normalizationContext: ['groups' => ['read:images']],
    denormalizationContext: ['groups' => ['write:images']],
)]
#[Uploadable]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:images', 'read:works'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:images'])]
    private ?string $name = null;

    #[Groups(['read:images', 'read:works'])]
    private ?string $path = null;

    #[UploadableField(mapping: 'image', fileNameProperty: 'name')]
    #[Groups(['read:images'])]
    private ?File $file = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[Groups(['read:images'])]
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
