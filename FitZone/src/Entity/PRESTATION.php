<?php

namespace App\Entity;

use App\Repository\PRESTATIONRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PRESTATIONRepository::class)]
class PRESTATION
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $TitrePresta = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $DescriptionPresta = null;

    #[ORM\Column]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrePresta(): ?string
    {
        return $this->TitrePresta;
    }

    public function setTitrePresta(?string $TitrePresta): static
    {
        $this->TitrePresta = $TitrePresta;

        return $this;
    }

    public function getDescriptionPresta(): ?string
    {
        return $this->DescriptionPresta;
    }

    public function setDescriptionPresta(string $DescriptionPresta): static
    {
        $this->DescriptionPresta = $DescriptionPresta;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
