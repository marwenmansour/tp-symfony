<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=prof::class, inversedBy="matiere", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $prof;

    /**
     * @ORM\OneToMany(targetEntity=note::class, mappedBy="matiere")
     */
    private $note;

    public function __construct()
    {
        $this->note = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getProf(): ?prof
    {
        return $this->prof;
    }

    public function setProf(prof $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    /**
     * @return Collection|note[]
     */
    public function getNote(): Collection
    {
        return $this->note;
    }

    public function addNote(note $note): self
    {
        if (!$this->note->contains($note)) {
            $this->note[] = $note;
            $note->setMatiere($this);
        }

        return $this;
    }

    public function removeNote(note $note): self
    {
        if ($this->note->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getMatiere() === $this) {
                $note->setMatiere(null);
            }
        }

        return $this;
    }
}
