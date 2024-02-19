<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
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
     * @ORM\OneToMany(targetEntity=ue::class, mappedBy="id_theme")
     */
    private $id_ue;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, mappedBy="themes")
     */
    private $utilisateurs;

    public function __construct()
    {
        $this->id_ue = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
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
     * @return Collection<int, ue>
     */
    public function getIdUe(): Collection
    {
        return $this->id_ue;
    }

    public function addIdUe(ue $idUe): self
    {
        if (!$this->id_ue->contains($idUe)) {
            $this->id_ue[] = $idUe;
            $idUe->setIdTheme($this);
        }

        return $this;
    }

    public function removeIdUe(ue $idUe): self
    {
        if ($this->id_ue->removeElement($idUe)) {
            // set the owning side to null (unless already changed)
            if ($idUe->getIdTheme() === $this) {
                $idUe->setIdTheme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addTheme($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeTheme($this);
        }

        return $this;
    }
}
