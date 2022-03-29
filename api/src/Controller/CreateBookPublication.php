<?php

namespace App\Controller;

use App\Entity\Professor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateBookPublication extends AbstractController
{
    public function __invoke(Book $data): Book
    {

        return $data;
    }
}