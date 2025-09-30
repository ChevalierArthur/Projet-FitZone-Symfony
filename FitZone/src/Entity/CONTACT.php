<?php

namespace App\Entity;

use App\Repository\CONTACTRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CONTACTRepository::class)]
class CONTACT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $MessageContact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ObjetContact = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $utilisateur_contact = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageContact(): ?string
    {
        return $this->MessageContact;
    }

    public function setMessageContact(string $MessageContact): static
    {
        $this->MessageContact = $MessageContact;

        return $this;
    }

    public function getObjetContact(): ?string
    {
        return $this->ObjetContact;
    }

    public function setObjetContact(string $ObjetContact): static
    {
        $this->ObjetContact = $ObjetContact;

        return $this;
    }

    public function getIdutilisateurcontact(): ?utilisateur
    {
        return $this->utilisateur_contact;
    }

    public function setIdutilisateurcontact(?utilisateur $utilisateur_contact): static
    {
        $this->utilisateur_contact = $utilisateur_contact;

        return $this;
    }
}
