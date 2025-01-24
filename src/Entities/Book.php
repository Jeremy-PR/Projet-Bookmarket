<?php

final class Book
{
    private ?int $id;
    private string $titre;
    private string $auteur;
    private string $description;
    private ?int $idGenre;
    private ?int $prix;
    private ?int $idImage;
    private ?int $idVendeur;
    private ?int $idEtat;
    private ?int $idAnnonce;

    // Constructeur avec paramètres optionnels
    public function __construct(
        string $titre,
        string $auteur,
        string $description,
        ?int $idGenre = null,
        ?int $prix = null,
        ?int $idImage = null,
        ?int $idVendeur = null,
        ?int $idEtat = null,
        ?int $idAnnonce = null,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->description = $description;
        $this->idGenre = $idGenre;
        $this->prix = $prix;
        $this->idImage = $idImage;
        $this->idVendeur = $idVendeur;
        $this->idEtat = $idEtat;
        $this->idAnnonce = $idAnnonce;
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getAuteur(): string
    {
        return $this->auteur;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIdGenre(): ?int
    {
        return $this->idGenre;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function getIdImage(): ?int
    {
        return $this->idImage;
    }

    public function getIdVendeur(): ?int
    {
        return $this->idVendeur;
    }

    public function getIdEtat(): ?int
    {
        return $this->idEtat;
    }

    public function getIdAnnonce(): ?int
    {
        return $this->idAnnonce;
    }

    // Setters (optionnels, selon tes besoins)
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setIdGenre(?int $idGenre): void
    {
        $this->idGenre = $idGenre;
    }

    public function setPrix(?int $prix): void
    {
        $this->prix = $prix;
    }

    public function setIdImage(?int $idImage): void
    {
        $this->idImage = $idImage;
    }

    public function setIdVendeur(?int $idVendeur): void
    {
        $this->idVendeur = $idVendeur;
    }

    public function setIdEtat(?int $idEtat): void
    {
        $this->idEtat = $idEtat;
    }

    public function setIdAnnonce(?int $idAnnonce): void
    {
        $this->idAnnonce = $idAnnonce;
    }
}
