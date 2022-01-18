<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjectRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'boolean')]
    private $featured;

    #[ORM\Column(type: 'string', length: 255)]
    #[Gedmo\Slug(fields: ['name'])]
    private $slug;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'follow')]
    private $followers;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'work')]
    private $workers;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private $autor;

    #[ORM\ManyToMany(targetEntity: tag::class, inversedBy: 'projects')]
    private $tags;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: needcontent::class, orphanRemoval: true)]
    private $needContents;

    #[ORM\ManyToMany(targetEntity: category::class, inversedBy: 'projects')]
    private $categories;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: step::class, orphanRemoval: true)]
    private $steps;

    public function __construct()
    {
        $this->followers = new ArrayCollection();
        $this->workers = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->needContents = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->steps = new ArrayCollection();
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

    public function getFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFollowers(): Collection
    {
        return $this->followers;
    }

    public function addFollower(User $follower): self
    {
        if (!$this->followers->contains($follower)) {
            $this->followers[] = $follower;
            $follower->addFollowProject($this);
        }

        return $this;
    }

    public function removeFollower(User $follower): self
    {
        if ($this->followers->removeElement($follower)) {
            $follower->removeFollowProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    public function addWorker(User $worker): self
    {
        if (!$this->workers->contains($worker)) {
            $this->workers[] = $worker;
            $worker->addWork($this);
        }

        return $this;
    }

    public function removeWorker(User $worker): self
    {
        if ($this->workers->removeElement($worker)) {
            $worker->removeWork($this);
        }

        return $this;
    }

    public function getAutor(): ?User
    {
        return $this->autor;
    }

    public function setAutor(?User $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * @return Collection|tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    /**
     * @return Collection|needcontent[]
     */
    public function getNeedContents(): Collection
    {
        return $this->needContents;
    }

    public function addNeedContent(needcontent $needContent): self
    {
        if (!$this->needContents->contains($needContent)) {
            $this->needContents[] = $needContent;
            $needContent->setProject($this);
        }

        return $this;
    }

    public function removeNeedContent(needcontent $needContent): self
    {
        if ($this->needContents->removeElement($needContent)) {
            // set the owning side to null (unless already changed)
            if ($needContent->getProject() === $this) {
                $needContent->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|step[]
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(step $step): self
    {
        if (!$this->steps->contains($step)) {
            $this->steps[] = $step;
            $step->setProject($this);
        }

        return $this;
    }

    public function removeStep(step $step): self
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getProject() === $this) {
                $step->setProject(null);
            }
        }

        return $this;
    }
}
