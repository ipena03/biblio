<?php

namespace App\Entity;

use App\Repository\HistoriqueEmpruntRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistoriqueEmpruntRepository::class)]
class HistoriqueEmprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAction = null;

    #[ORM\Column(length: 255)]
    private ?string $action = null;

    #[ORM\ManyToOne(inversedBy: 'historiqueEmprunts')]
    private ?Emprunt $id_emprunt = null;

    #[ORM\ManyToOne(inversedBy: 'historiqueEmprunts')]
    private ?Personnel $id_personnel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAction(): ?\DateTimeInterface
    {
        return $this->dateAction;
    }

    public function setDateAction(\DateTimeInterface $dateAction): static
    {
        $this->dateAction = $dateAction;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getIdEmprunt(): ?Emprunt
    {
        return $this->id_emprunt;
    }

    public function setIdEmprunt(?Emprunt $id_emprunt): static
    {
        $this->id_emprunt = $id_emprunt;

        return $this;
    }

    public function getIdPersonnel(): ?Personnel
    {
        return $this->id_personnel;
    }

    public function setIdPersonnel(?Personnel $id_personnel): static
    {
        $this->id_personnel = $id_personnel;

        return $this;
    }
}
