<?php

namespace App\Entity;

use App\Repository\UeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UeRepository::class)
 */
class Ue
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
     * @ORM\OneToMany(targetEntity=Qcm::class, mappedBy="id_ue")
     */
    private $id_qcm;

    /**
     * @ORM\ManyToOne(targetEntity=Theme::class, inversedBy="id_ue")
     */
    private $id_theme;

    /**
     * @ORM\Column(type="integer")
     */
    private $x;

    /**
     * @ORM\Column(type="integer")
     */
    private $y;

    public function __construct()
    {
        $this->id_qcm = new ArrayCollection();
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
     * @return Collection<int, Qcm>
     */
    public function getIdQcm(): Collection
    {
        return $this->id_qcm;
    }

    public function addIdQcm(Qcm $idQcm): self
    {
        if (!$this->id_qcm->contains($idQcm)) {
            $this->id_qcm[] = $idQcm;
            $idQcm->setIdUe($this);
        }

        return $this;
    }

    public function removeIdQcm(Qcm $idQcm): self
    {
        if ($this->id_qcm->removeElement($idQcm)) {
            // set the owning side to null (unless already changed)
            if ($idQcm->getIdUe() === $this) {
                $idQcm->setIdUe(null);
            }
        }

        return $this;
    }

    public function getIdTheme(): ?Theme
    {
        return $this->id_theme;
    }

    public function setIdTheme(?Theme $id_theme): self
    {
        $this->id_theme = $id_theme;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }
}
