<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfessorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Controller\ProfController;

#[ORM\Entity(repositoryClass: ProfessorRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    itemOperations: [
        'get',
        'put'// => ['denormalization_context' => ['groups' => ['put']]]
        // 'get_prof' => [
        //     'method' => 'GET',
        //     'path' => '/professor/{id}',
        //     'controller' => ProfController::class
        // ]
    ],
    collectionOperations: [
        'post',
        'count_prof' => [
            'method' => 'GET',
            'path' => '/prof/count',
            'controller' => ProfController::class
            //'normalization_context' => ['groups' => ['prof']],
            //'denormalization_context' => ['groups' => ['deprof']]
        ]
    ]
)]
class Professor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["write"/*,"prof","deprof"*/])]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(["write"/*,"prof","deprof"*/])]
    private $lastName;

    #[ORM\OneToMany(mappedBy: 'professor', targetEntity: Course::class)]
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setProfessor($this);
        }

        return $this;
    }
    
    #[Groups("read")]
    public function getFullName()
    {
        return $this->getFirstName() . " " . $this->getLastName();
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getProfessor() === $this) {
                $course->setProfessor(null);
            }
        }

        return $this;
    }

}
