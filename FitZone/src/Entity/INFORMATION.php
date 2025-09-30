<?php

namespace App\Entity;

use App\Repository\INFORMATIONRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: INFORMATIONRepository::class)]
class INFORMATION
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $TextAccueil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTextAccueil(): ?string
    {
        return $this->TextAccueil;
    }

    public function setTextAccueil(string $TextAccueil): static
    {
        $this->TextAccueil = $TextAccueil;

        return $this;
    }
}
