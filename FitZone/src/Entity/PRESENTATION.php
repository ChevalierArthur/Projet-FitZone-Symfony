<?php

namespace App\Entity;

use App\Repository\PRESENTATIONRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PRESENTATIONRepository::class)]
class PRESENTATION
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Introduction = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Texte = null;

    #[ORM\Column(length: 255)]
    private ?string $Photo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntroduction(): ?string
    {
        return $this->Introduction;
    }

    public function setIntroduction(string $Introduction): static
    {
        $this->Introduction = $Introduction;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->Texte;
    }

    public function setTexte(string $Texte): static
    {
        $this->Texte = $Texte;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): static
    {
        $this->Photo = $Photo;

        return $this;
    }
}
