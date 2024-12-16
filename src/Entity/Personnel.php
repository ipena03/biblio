<?php

namespace App\Entity;

use App\Repository\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnelRepository::class)]
class Personnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $nom = null;

    #[ORM\Column(length: 30)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEmbauche = null;

    /**
     * @var Collection<int, HistoriqueEmprunt>
     */
    #[ORM\OneToMany(targetEntity: HistoriqueEmprunt::class, mappedBy: 'id_personnel')]
    private Collection $historiqueEmprunts;

    public function __construct()
    {
        $this->historiqueEmprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->dateEmbauche;
    }

    public function setDateEmbauche(\DateTimeInterface $dateEmbauche): static
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    /**
     * @return Collection<int, HistoriqueEmprunt>
     */
    public function getHistoriqueEmprunts(): Collection
    {
        return $this->historiqueEmprunts;
    }

    public function addHistoriqueEmprunt(HistoriqueEmprunt $historiqueEmprunt): static
    {
        if (!$this->historiqueEmprunts->contains($historiqueEmprunt)) {
            $this->historiqueEmprunts->add($historiqueEmprunt);
            $historiqueEmprunt->setIdPersonnel($this);
        }

        return $this;
    }

    public function removeHistoriqueEmprunt(HistoriqueEmprunt $historiqueEmprunt): static
    {
        if ($this->historiqueEmprunts->removeElement($historiqueEmprunt)) {
            // set the owning side to null (unless already changed)
            if ($historiqueEmprunt->getIdPersonnel() === $this) {
                $historiqueEmprunt->setIdPersonnel(null);
            }
        }

        return $this;
    }
}
