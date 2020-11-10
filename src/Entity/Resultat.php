<?php

namespace App\Entity;

use App\Repository\ResultatRepository;
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
}
