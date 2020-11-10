<?php

namespace App\Entity;

use App\Repository\ListeDeMotsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeDeMotsRepository::class)
 */
class ListeDeMots
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToMany(targetEntity=Mot::class, inversedBy="listeDeMots")
     */
    private $mots;

    public function __construct()
    {
        $this->mots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

 

    /**
     * @return Collection|Mot[]
     */
    public function getMots(): Collection
    {
        return $this->mots;
    }

    public function addMot(Mot $mot): self
    {
        if (!$this->mots->contains($mot)) {
            $this->mots[] = $mot;
        }

        return $this;
    }

    public function removeMot(Mot $mot): self
    {
        $this->mots->removeElement($mot);

        return $this;
    }
}
