<?php

namespace App\Entity;

use App\Repository\UtilisateurThemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurThemeRepository::class)
 * @ORM\Table(name="utilisateur_theme")
 */
class UtilisateurTheme
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Utilisateur::class)
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $utilisateur;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Theme::class)
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $theme;

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
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
}