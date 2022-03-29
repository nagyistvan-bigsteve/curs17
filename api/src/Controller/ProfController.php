<?php

namespace App\Controller;

use App\Services\ProfService;
use App\Entity\Professor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProfessorRepository;
use Symfony\Component\HttpFoundation\Response;

#[AsController]
class ProfController extends AbstractController
{
    private $profService;

    public function __construct(ProfService $profService){
        $this->profService = $profService;
    }

    public function __invoke()
    {   
        return $this->profService->getCountProfNumber();
    }

    // public function show(int $id, ProfessorRepository $professorRepository): Response
    // {
    //     $professor = $professortRepository
    //         ->find($id);
    //     return $professor;
    // }

}