<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 */
class Cars
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Carburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbrPlaces;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Disponibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $datemiseencirculation;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="ManyToOne")
     */
    private $idAgence;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->Couleur;
    }

    public function setCouleur(string $Couleur): self
    {
        $this->Couleur = $Couleur;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->Carburant;
    }

    public function setCarburant(string $Carburant): self
    {
        $this->Carburant = $Carburant;

        return $this;
    }

    public function getNbrPlaces(): ?int
    {
        return $this->NbrPlaces;
    }

    public function setNbrPlaces(int $NbrPlaces): self
    {
        $this->NbrPlaces = $NbrPlaces;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->Disponibilite;
    }

    public function setDisponibilite(string $Disponibilite): self
    {
        $this->Disponibilite = $Disponibilite;

        return $this;
    }

    public function getDatemiseencirculation(): ?string
    {
        return $this->datemiseencirculation;
    }

    public function setDatemiseencirculation(string $datemiseencirculation): self
    {
        $this->datemiseencirculation = $datemiseencirculation;

        return $this;
    }

    public function getIdAgence(): ?Agence
    {
        return $this->idAgence;
    }

    public function setIdAgence(?Agence $idAgence): self
    {
        $this->idAgence = $idAgence;

        return $this;
    }

}
