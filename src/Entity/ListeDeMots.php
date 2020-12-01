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
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="listeDeMots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity=Mot::class)
     * @ORM\JoinColumn(nullable=false)
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

 

    

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getMots(): ?Mot
    {
        return $this->mots;
    }

    public function setMots(?Mot $mots): self
    {
        $this->mots = $mots;

        return $this;
    }

   
}
