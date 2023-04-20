<?php

namespace App\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Vich\UploaderBundle\Storage\StorageInterface;

class ImageNormalizer implements NormalizerInterface, CacheableSupportsMethodInterface
{
    public function __construct(private ObjectNormalizer $normalizer, private StorageInterface $storage)
    {
    }

    public function normalize($file, string $format = null, array $context = []): array
    {
        $file->setPath($this->storage->resolveUri($file, 'file'));
        $data = $this->normalizer->normalize($file, $format, $context);

        return $data;
    }

    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof \App\Entity\Images;
    }

    public function hasCacheableSupportsMethod(): bool
    {
        return true;
    }
}
