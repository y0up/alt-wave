<?php

namespace App\Entity;

use App\Repository\NeedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NeedRepository::class)]
class Need
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\OneToMany(mappedBy: 'need', targetEntity: NeedContent::class, orphanRemoval: true)]
    private $needContents;

    public function __construct()
    {
        $this->needContents = new ArrayCollection();
    }

    function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|NeedContent[]
     */
    public function getNeedContents(): Collection
    {
        return $this->needContents;
    }

    public function addNeedContent(NeedContent $needContent): self
    {
        if (!$this->needContents->contains($needContent)) {
            $this->needContents[] = $needContent;
            $needContent->setNeed($this);
        }

        return $this;
    }

    public function removeNeedContent(NeedContent $needContent): self
    {
        if ($this->needContents->removeElement($needContent)) {
            // set the owning side to null (unless already changed)
            if ($needContent->getNeed() === $this) {
                $needContent->setNeed(null);
            }
        }

        return $this;
    }
}
