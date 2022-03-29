<?php

namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Professor;
use App\Controller\ProfController;

class ProfService{

    private $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;

    }

    public function getCountProfNumber(){

        $count = $this->em->getRepository(Professor::class)->countProf();


        return $count;
    }
}