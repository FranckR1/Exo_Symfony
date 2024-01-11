<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[Broadcast]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:"idCategories", nullable: false)]
    private ?Categories $idCategories = null;

    #[ORM\Column(name:"nomproduits", length: 255)]
    private ?string $nomproduits = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(name:"dateajout", type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateajout = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCategories(): ?Categories
    {
        return $this->idCategories;
    }

    public function setIdCategories(?Categories $idCategories): static
    {
        $this->idCategories = $idCategories;

        return $this;
    }

    public function getNomProduits(): ?string
    {
        return $this->nomproduits;
    }

    public function setNomProduits(string $nomproduits): static
    {
        $this->nomproduits = $nomproduits;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateajout;
    }

    public function setDateAjout(\DateTimeInterface $dateajout): static
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }
}
