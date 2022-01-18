<?php

namespace App\Entity;

use App\Repository\UserProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProjectRepository::class)]
class UserProject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: user::class, inversedBy: 'userProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: project::class, inversedBy: 'userProjects')]
    #[ORM\JoinColumn(nullable: false)]
    private $project;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $autor;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $collaborate;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $follow;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getProject(): ?project
    {
        return $this->project;
    }

    public function setProject(?project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getAutor(): ?bool
    {
        return $this->autor;
    }

    public function setAutor(?bool $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getCollaborate(): ?bool
    {
        return $this->collaborate;
    }

    public function setCollaborate(?bool $collaborate): self
    {
        $this->collaborate = $collaborate;

        return $this;
    }

    public function getFollow(): ?bool
    {
        return $this->follow;
    }

    public function setFollow(?bool $follow): self
    {
        $this->follow = $follow;

        return $this;
    }
}
