<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CreateBookPublication;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    collectionOperations:[ 
        'post' =>[
            'method' => 'POST',
            'path' => '/books/{id}/publication',
            'controller' => CreateBookPublication::class,
            'normalization_context'  => ['groups' => ['read']],
            'denormalization_context'  => ['groups' => ['write']]
            ]
        ],
    itemOperations:[],

    )]
class Book
{
    #[Groups("write")]
    private $id;

    #[Groups("read")]
    private $isbn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?int
    {
        return $this->isbn;
    }

    public function setIsbn(?int $isbn): int
    {
        $this->isbn = $isbn;

        return $this;
    }

}