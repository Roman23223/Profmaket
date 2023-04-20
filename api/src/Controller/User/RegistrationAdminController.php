<?php

namespace App\Controller\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[AsController]
class RegistrationAdminController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private ValidatorInterface $validator,
        private UserPasswordHasherInterface $passwordHasher,
    ){}

    public function __invoke(User $data): User
    {
        $this->validator->validate($data);

        $data->setUsername($data->getUsername());
        $data->setRoles(roles: ["ROLE_ADMIN"]);
        $data->setPassword($this->passwordHasher->hashPassword($data, $data->getPassword()));

        $this->entityManager->persist($data);
        $this->entityManager->flush();

        return $data;
    }

}
