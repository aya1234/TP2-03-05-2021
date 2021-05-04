<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */
class Agence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $telagence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseville;

    /**
     * @ORM\OneToMany(targetEntity=Cars::class, mappedBy="idAgence")
     */
    private $ManyToOne;

    public function __construct()
    {
        $this->ManyToOne = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelagence(): ?int
    {
        return $this->telagence;
    }

    public function setTelagence(int $telagence): self
    {
        $this->telagence = $telagence;

        return $this;
    }

    public function getAdresseville(): ?string
    {
        return $this->adresseville;
    }

    public function setAdresseville(string $adresseville): self
    {
        $this->adresseville = $adresseville;

        return $this;
    }

    /**
     * @return Collection|Cars[]
     */
    public function getManyToOne(): Collection
    {
        return $this->ManyToOne;
    }

    public function addManyToOne(Cars $manyToOne): self
    {
        if (!$this->ManyToOne->contains($manyToOne)) {
            $this->ManyToOne[] = $manyToOne;
            $manyToOne->setIdAgence($this);
        }

        return $this;
    }

    public function removeManyToOne(Cars $manyToOne): self
    {
        if ($this->ManyToOne->removeElement($manyToOne)) {
            // set the owning side to null (unless already changed)
            if ($manyToOne->getIdAgence() === $this) {
                $manyToOne->setIdAgence(null);
            }
        }

        return $this;
    }

}
