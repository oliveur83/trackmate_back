<?php

namespace App\Entity;

use App\Repository\TraitUeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraitUeRepository::class)
 */
class TraitUe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity=Ue::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_dep;

    /**
     * @ORM\ManyToOne(targetEntity=Ue::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_arv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDep(): ?string
    {
        return $this->id_dep;
    }

    public function setIdDep(string $id_dep): self
    {
        $this->id_dep = $id_dep;

        return $this;
    }

    public function getIdArv(): ?string
    {
        return $this->id_arv;
    }

    public function setIdArv(string $id_arv): self
    {
        $this->id_arv = $id_arv;

        return $this;
    }
}