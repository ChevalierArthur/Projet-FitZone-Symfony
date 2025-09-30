<?php

namespace App\Entity;

use App\Repository\UTILISATEURRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UTILISATEURRepository::class)]
class UTILISATEUR
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $NumTel = null;

    #[ORM\Column(length: 255)]
    private ?string $Identifiant = null;

    #[ORM\Column(length: 255)]
    private ?string $MotDePasse = null;

    #[ORM\Column]
    private ?bool $EstAdmin = null;

    /**
     * @var Collection<int, Avis>
     */
    #[ORM\OneToMany(targetEntity: Avis::class, mappedBy: 'idUtilisateurAvis')]
    private Collection $avis;

    /**
     * @var Collection<int, CONTACT>
     */
    #[ORM\OneToMany(targetEntity: CONTACT::class, mappedBy: 'idutilisateurcontact')]
    private Collection $contacts;

    public function __construct()
    {
        $this->avis = new ArrayCollection();
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->NumTel;
    }

    public function setNumTel(string $NumTel): static
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->Identifiant;
    }

    public function setIdentifiant(string $Identifiant): static
    {
        $this->Identifiant = $Identifiant;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->MotDePasse;
    }

    public function setMotDePasse(string $MotDePasse): static
    {
        $this->MotDePasse = $MotDePasse;

        return $this;
    }

    public function isEstAdmin(): ?bool
    {
        return $this->EstAdmin;
    }

    public function setEstAdmin(bool $EstAdmin): static
    {
        $this->EstAdmin = $EstAdmin;

        return $this;
    }

    /**
     * @return Collection<int, Avis>
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): static
    {
        if (!$this->avis->contains($avi)) {
            $this->avis->add($avi);
            $avi->setIdUtilisateurAvis($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): static
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getIdUtilisateurAvis() === $this) {
                $avi->setIdUtilisateurAvis(null);
            }
        }

        return $this;
    }


    /**
     * @return Collection<int, CONTACT>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(CONTACT $contact): static
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setIdutilisateurcontact($this);
        }

        return $this;
    }

    public function removeContact(CONTACT $contact): static
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getIdutilisateurcontact() === $this) {
                $contact->setIdutilisateurcontact(null);
            }
        }

        return $this;
    }
}
