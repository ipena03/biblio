<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateReservation = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Etudiant $id_etudiant = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Livre $id_livre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): static
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getIdEtudiant(): ?Etudiant
    {
        return $this->id_etudiant;
    }

    public function setIdEtudiant(?Etudiant $id_etudiant): static
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }

    public function getIdLivre(): ?Livre
    {
        return $this->id_livre;
    }

    public function setIdLivre(?Livre $id_livre): static
    {
        $this->id_livre = $id_livre;

        return $this;
    }
}
