<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: ModuleRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['module:read']],
    denormalizationContext: ['groups' => ['module:write']]
)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	#[Groups(['module:read', 'module:write', 'favorite:read', 'student:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
	#[Groups(['module:read', 'module:write', 'favorite:read', 'student:read'])]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'module')]
    #[ORM\JoinColumn(nullable: false)]
	#[Groups(['module:read', 'module:write', ])]
    private ?Chapter $chapter = null;

    /**
     * @var Collection<int, StudentModule>
     */
    #[ORM\OneToMany(targetEntity: StudentModule::class, mappedBy: 'module', cascade: ['remove'], orphanRemoval: true)]
	#[Groups(['module:read'])]
	private Collection $StudentModule;

    /**
     * @var Collection<int, Favorite>
     */
    #[ORM\OneToMany(targetEntity: Favorite::class, mappedBy: 'module', cascade: ['remove'], orphanRemoval: true)]
	#[Groups(['module:read'])]
    private Collection $favorite;

    public function __construct()
    {
        $this->StudentModule = new ArrayCollection();
        $this->favorite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getChapter(): ?Chapter
    {
        return $this->chapter;
    }

    public function setChapter(?Chapter $chapter): static
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * @return Collection<int, StudentModule>
     */
    public function getStudentModule(): Collection
    {
        return $this->StudentModule;
    }

    public function addStudentModule(StudentModule $StudentModule): static
    {
        if (!$this->StudentModule->contains($StudentModule)) {
            $this->StudentModule->add($StudentModule);
            $StudentModule->setModule($this);
        }

        return $this;
    }

    public function removeStudentModule(StudentModule $StudentModule): static
    {
        if ($this->StudentModule->removeElement($StudentModule)) {
            // set the owning side to null (unless already changed)
            if ($StudentModule->getModule() === $this) {
                $StudentModule->setModule(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Favorite>
     */
    public function getFavorite(): Collection
    {
        return $this->favorite;
    }

    public function addFavorite(Favorite $favorite): static
    {
        if (!$this->favorite->contains($favorite)) {
            $this->favorite->add($favorite);
            $favorite->setModule($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): static
    {
        if ($this->favorite->removeElement($favorite)) {
            // set the owning side to null (unless already changed)
            if ($favorite->getModule() === $this) {
                $favorite->setModule(null);
            }
        }

        return $this;
    }
}
