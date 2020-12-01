<?php

namespace App\Entity;

use App\Repository\MotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MotRepository::class)
 */
class Mot
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
    private $libelle;


    /**
     * @ORM\ManyToMany(targetEntity=ListeDeMots::class, mappedBy="mots")
     */
    private $listeDeMots;

    public function __construct()
    {
        $this->listeDeMots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }



    /**
     * @return Collection|ListeDeMots[]
     */
    public function getListeDeMots(): Collection
    {
        return $this->listeDeMots;
    }

    public function addListeDeMot(ListeDeMots $listeDeMot): self
    {
        if (!$this->listeDeMots->contains($listeDeMot)) {
            $this->listeDeMots[] = $listeDeMot;
            $listeDeMot->addMot($this);
        }

        return $this;
    }

    public function removeListeDeMot(ListeDeMots $listeDeMot): self
    {
        if ($this->listeDeMots->removeElement($listeDeMot)) {
            $listeDeMot->removeMot($this);
        }

        return $this;
    }
}
