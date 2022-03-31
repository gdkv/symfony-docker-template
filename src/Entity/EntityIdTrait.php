<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Component\Uid\UuidV6;

trait EntityIdTrait {
    
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private $id;

    public function getId(): ?UuidV6
    {
        return $this->id;
    }

    public function withId(string|UuidV6 $id): static
    {
        $self = clone $this;
        if ($id instanceof UuidV6) {
            $self->id = $id;
        }
        else {
            $self->id = UuidV6::fromString((string)$id);
        }
        return $self;
    }
}