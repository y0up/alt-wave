<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    private $plainPassword;

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastname;

    #[ORM\Column(type: 'string', length: 255)]
    private $username;

    #[ORM\Column(type: 'string' , length: 255)]
    private $dateOfBirth;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phoneNumber;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'boolean')]
    private $disponibility;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $disponibilityDesc;

    #[ORM\Column(type: 'string', length: 100)]
    #[Gedmo\Slug(fields: ['username'])]
    private $slug;

    #[ORM\ManyToMany(targetEntity: project::class, inversedBy: 'followers')]
    private $followProject;

    #[ORM\ManyToMany(targetEntity: user::class, inversedBy: 'followers')]
    private $followUser;

    #[ORM\ManyToMany(targetEntity: project::class, inversedBy: 'workers')]
    private $work;

    #[ORM\OneToMany(mappedBy: 'autor', targetEntity: project::class, orphanRemoval: true)]
    private $projects;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'followUser')]
    private $followers;

    #[ORM\ManyToMany(targetEntity: domain::class, inversedBy: 'users')]
    private $domains;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: sociallink::class, orphanRemoval: true)]
    private $socialLinks;

    #[ORM\ManyToMany(targetEntity: tag::class, inversedBy: 'users')]
    private $tags;

    public function __construct()
    {
        $this->followProject = new ArrayCollection();
        $this->followUser = new ArrayCollection();
        $this->work = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->followers = new ArrayCollection();
        $this->domains = new ArrayCollection();
        $this->socialLinks = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDateOfBirth(): ?string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

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
     * Get the value of plainPassword
     */ 
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * Set the value of plainPassword
     *
     * @return  self
     */ 
    public function setPlainPassword(string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getDisponibility(): ?bool
    {
        return $this->disponibility;
    }

    public function setDisponibility(bool $disponibility): self
    {
        $this->disponibility = $disponibility;

        return $this;
    }

    public function getDisponibilityDesc(): ?string
    {
        return $this->disponibilityDesc;
    }

    public function setDisponibilityDesc(?string $disponibilityDesc): self
    {
        $this->disponibilityDesc = $disponibilityDesc;

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
     * @return Collection|project[]
     */
    public function getFollowProject(): Collection
    {
        return $this->followProject;
    }

    public function addFollowProject(project $followProject): self
    {
        if (!$this->followProject->contains($followProject)) {
            $this->followProject[] = $followProject;
        }

        return $this;
    }

    public function removeFollowProject(project $followProject): self
    {
        $this->followProject->removeElement($followProject);

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getFollowUser(): Collection
    {
        return $this->followUser;
    }

    public function addFollowUser(user $followUser): self
    {
        if (!$this->followUser->contains($followUser)) {
            $this->followUser[] = $followUser;
        }

        return $this;
    }

    public function removeFollowUser(user $followUser): self
    {
        $this->followUser->removeElement($followUser);

        return $this;
    }

    /**
     * @return Collection|project[]
     */
    public function getWork(): Collection
    {
        return $this->work;
    }

    public function addWork(project $work): self
    {
        if (!$this->work->contains($work)) {
            $this->work[] = $work;
        }

        return $this;
    }

    public function removeWork(project $work): self
    {
        $this->work->removeElement($work);

        return $this;
    }

    /**
     * @return Collection|project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setAutor($this);
        }

        return $this;
    }

    public function removeProject(project $project): self
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getAutor() === $this) {
                $project->setAutor(null);
            }
        }

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
            $follower->addFollowUser($this);
        }

        return $this;
    }

    public function removeFollower(User $follower): self
    {
        if ($this->followers->removeElement($follower)) {
            $follower->removeFollowUser($this);
        }

        return $this;
    }

    /**
     * @return Collection|domain[]
     */
    public function getDomains(): Collection
    {
        return $this->domains;
    }

    public function addDomain(domain $domain): self
    {
        if (!$this->domains->contains($domain)) {
            $this->domains[] = $domain;
        }

        return $this;
    }

    public function removeDomain(domain $domain): self
    {
        $this->domains->removeElement($domain);

        return $this;
    }

    /**
     * @return Collection|sociallink[]
     */
    public function getSocialLinks(): Collection
    {
        return $this->socialLinks;
    }

    public function addSocialLink(sociallink $socialLink): self
    {
        if (!$this->socialLinks->contains($socialLink)) {
            $this->socialLinks[] = $socialLink;
            $socialLink->setUser($this);
        }

        return $this;
    }

    public function removeSocialLink(sociallink $socialLink): self
    {
        if ($this->socialLinks->removeElement($socialLink)) {
            // set the owning side to null (unless already changed)
            if ($socialLink->getUser() === $this) {
                $socialLink->setUser(null);
            }
        }

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
}
