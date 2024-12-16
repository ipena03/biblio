<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEmprunt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRetourPrevue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateRetourEffective = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etudiant $idEtudiant = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exemplaire $idExemplaire = null;

    /**
     * @var Collection<int, HistoriqueEmprunt>
     */
    #[ORM\OneToMany(targetEntity: HistoriqueEmprunt::class, mappedBy: 'id_emprunt')]
    private Collection $historiqueEmprunts;

    public function __construct()
    {
        $this->historiqueEmprunts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->dateEmprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $dateEmprunt): static
    {
        $this->dateEmprunt = $dateEmprunt;

        return $this;
    }

    public function getDateRetourPrevue(): ?\DateTimeInterface
    {
        return $this->dateRetourPrevue;
    }

    public function setDateRetourPrevue(\DateTimeInterface $dateRetourPrevue): static
    {
        $this->dateRetourPrevue = $dateRetourPrevue;

        return $this;
    }

    public function getDateRetourEffective(): ?\DateTimeInterface
    {
        return $this->dateRetourEffective;
    }

    public function setDateRetourEffective(\DateTimeInterface $dateRetourEffective): static
    {
        $this->dateRetourEffective = $dateRetourEffective;

        return $this;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(?Etudiant $idEtudiant): static
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    public function getIdExemplaire(): ?Exemplaire
    {
        return $this->idExemplaire;
    }

    public function setIdExemplaire(?Exemplaire $idExemplaire): static
    {
        $this->idExemplaire = $idExemplaire;

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
            $historiqueEmprunt->setIdEmprunt($this);
        }

        return $this;
    }

    public function removeHistoriqueEmprunt(HistoriqueEmprunt $historiqueEmprunt): static
    {
        if ($this->historiqueEmprunts->removeElement($historiqueEmprunt)) {
            // set the owning side to null (unless already changed)
            if ($historiqueEmprunt->getIdEmprunt() === $this) {
                $historiqueEmprunt->setIdEmprunt(null);
            }
        }

        return $this;
    }
}
