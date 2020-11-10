<?php

namespace App\Entity;

use App\Repository\AbonnementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbonnementRepository::class)
 */
class Abonnement
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
    private $posologie;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $modalitesdepaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getModalitesdepaiement(): ?string
    {
        return $this->modalitesdepaiement;
    }

    public function setModalitesdepaiement(string $modalitesdepaiement): self
    {
        $this->modalitesdepaiement = $modalitesdepaiement;

        return $this;
    }
}
