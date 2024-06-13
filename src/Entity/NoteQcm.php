<?php

namespace App\Entity;

use App\Repository\NoteQcmRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteQcmRepository::class)
 */
class NoteQcm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=utilisateur::class)
     */
    private $id_util;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity=qcm::class)
     */
    private $id_qcm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtil(): ?utilisateur
    {
        return $this->id_util;
    }

    public function setIdUtil(?utilisateur $id_util): self
    {
        $this->id_util = $id_util;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getIdQcm(): ?qcm
    {
        return $this->id_qcm;
    }

    public function setIdQcm(?qcm $id_qcm): self
    {
        $this->id_qcm = $id_qcm;

        return $this;
    }
}
