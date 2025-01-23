<?php

final class User
{
    private ?int $id;
    private Role $role;
    private string $nom;
    private string $prenom;
    private string $adresse;
    private string $ville;
    private string $email;
    private string $password;
    private ?string $nomEntreprise;
    private ?string $adresseEntreprise;
    private string $telephone;

    public function __construct(Role $role, string $nom, string $prenom, string $adresse, string $ville, string $email, string $password, string $telephone, int $id = null, string $nomEntreprise = null, string $adresseEntreprise = null )
    {
        $this->id = $id;
        $this->role = $role;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->email = $email;
        $this->password = $password;
        $this->nomEntreprise = $nomEntreprise;
        $this->adresseEntreprise = $adresseEntreprise;
        $this->telephone = $telephone;
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the value of nomEntreprise
     */ 
    public function getNomEntreprise(): string
    {
        return $this->nomEntreprise;
    }

    /**
     * Get the value of adresseEntreprise
     */ 
    public function getAdresseEntreprise(): string
    {
        return $this->adresseEntreprise;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    
}