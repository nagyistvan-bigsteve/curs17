<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
#[ApiResource(
    itemOperations: [
        'get',
        'put',
        'delete'
    ],
    collectionOperations: [
        'post'
    ]
)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $year;

    #[ORM\Column(type: 'json', nullable: true)]
    private $monday = [];

    #[ORM\Column(type: 'json', nullable: true)]
    private $tuesday = [];

    #[ORM\Column(type: 'json', nullable: true)]
    private $wednesday = [];

    #[ORM\Column(type: 'json', nullable: true)]
    private $thursday = [];

    #[ORM\Column(type: 'json', nullable: true)]
    private $friday = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getMonday(): ?array
    {
        return $this->monday;
    }

    public function setMonday(?array $monday): self
    {
        $this->monday = $monday;

        return $this;
    }

    public function getTuesday(): ?array
    {
        return $this->tuesday;
    }

    public function setTuesday(?array $tuesday): self
    {
        $this->tuesday = $tuesday;

        return $this;
    }

    public function getWednesday(): ?array
    {
        return $this->wednesday;
    }

    public function setWednesday(?array $wednesday): self
    {
        $this->wednesday = $wednesday;

        return $this;
    }

    public function getThursday(): ?array
    {
        return $this->thursday;
    }

    public function setThursday(?array $thursday): self
    {
        $this->thursday = $thursday;

        return $this;
    }

    public function getFriday(): ?array
    {
        return $this->friday;
    }

    public function setFriday(?array $friday): self
    {
        $this->friday = $friday;

        return $this;
    }
}
