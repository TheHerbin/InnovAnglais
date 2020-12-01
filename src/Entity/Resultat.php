<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultatRepository::class)
 */
class Resultat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $resultatstest;

    /**
     * @ORM\OneToMany(targetEntity=Tests::class, mappedBy="resultat")
     */
    private $tests;

    public function __construct()
    {
        $this->tests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResultatstest(): ?string
    {
        return $this->resultatstest;
    }

    public function setResultatstest(string $resultatstest): self
    {
        $this->resultatstest = $resultatstest;

        return $this;
    }

    /**
     * @return Collection|Tests[]
     */
    public function getTests(): Collection
    {
        return $this->tests;
    }

    public function addTest(Tests $test): self
    {
        if (!$this->tests->contains($test)) {
            $this->tests[] = $test;
            $test->setResultat($this);
        }

        return $this;
    }

    public function removeTest(Tests $test): self
    {
        if ($this->tests->removeElement($test)) {
            // set the owning side to null (unless already changed)
            if ($test->getResultat() === $this) {
                $test->setResultat(null);
            }
        }

        return $this;
    }
}
