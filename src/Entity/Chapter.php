<?php

namespace App\Entity;

use App\Repository\ChapterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ChapterRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['chapter:read']],
    denormalizationContext: ['groups' => ['chapter:write']]
)]
class Chapter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['chapter:read', 'chapter:write', 'module:read', 'favorite:read', 'student:read'])]
	private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['chapter:read', 'chapter:write', 'module:read', 'favorite:read', 'student:read'])]
    private ?string $title = null;

    /**
     * @var Collection<int, Module>
     */
    #[ORM\OneToMany(targetEntity: Module::class, mappedBy: 'chapter', cascade: ['remove'], orphanRemoval: true)]
    #[Groups(['chapter:read'])]
    private Collection $module;

    public function __construct()
    {
        $this->module = new ArrayCollection();
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

    /**
     * @return Collection<int, Module>
     */
    public function getModule(): Collection
    {
        return $this->module;
    }

    public function addModule(Module $module): static
    {
        if (!$this->module->contains($module)) {
            $this->module->add($module);
            $module->setChapter($this);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        if ($this->module->removeElement($module)) {
            // set the owning side to null (unless already changed)
            if ($module->getChapter() === $this) {
                $module->setChapter(null);
            }
        }

        return $this;
    }
}
