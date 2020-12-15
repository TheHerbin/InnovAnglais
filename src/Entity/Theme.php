<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 * @ApiResource()
 */
class Theme
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
     * @ORM\OneToMany(targetEntity=ListeDeMots::class, mappedBy="theme")
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
            $listeDeMot->setTheme($this);
        }

        return $this;
    }

    public function removeListeDeMot(ListeDeMots $listeDeMot): self
    {
        if ($this->listeDeMots->removeElement($listeDeMot)) {
            // set the owning side to null (unless already changed)
            if ($listeDeMot->getTheme() === $this) {
                $listeDeMot->setTheme(null);
            }
        }

        return $this;
    }
}
