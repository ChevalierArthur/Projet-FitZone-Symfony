<?php

namespace App\Entity;

use App\Repository\AVISRepository;
use Doctrine\ORM\Mapping as ORM;
use Dom\Text;

#[ORM\Entity(repositoryClass: AVISRepository::class)]
class AVIS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?Text $Messageavis = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?utilisateur $UtilisateurAvis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessageavis(): ?Text
    {
        return $this->Messageavis;
    }

    public function setMessageavis(Text $Messageavis): static
    {
        $this->Messageavis = $Messageavis;

        return $this;
    }

    public function getIdUtilisateurAvis(): ?utilisateur
    {
        return $this->UtilisateurAvis;
    }

    public function setIdUtilisateurAvis(?utilisateur $UtilisateurAvis): static
    {
        $this->UtilisateurAvis = $UtilisateurAvis;

        return $this;
    }
}
