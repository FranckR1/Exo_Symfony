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
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $id_Categories = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_produits = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCategories(): ?Categories
    {
        return $this->id_Categories;
    }

    public function setIdCategories(?Categories $id_Categories): static
    {
        $this->id_Categories = $id_Categories;

        return $this;
    }

    public function getNomProduits(): ?string
    {
        return $this->nom_produits;
    }

    public function setNomProduits(string $nom_produits): static
    {
        $this->nom_produits = $nom_produits;

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
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): static
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }
}
