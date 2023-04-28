<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class GetCurrentUserController extends AbstractController
{
    public function __construct(private Security $security) {}

    public function __invoke(Request $request)
    {
        $user = $this->security->getUser();
        return $user;
    }
}
