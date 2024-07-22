<?php

namespace App\Entity;

use App\Repository\FavoriteRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: FavoriteRepository::class)]
#[ORM\UniqueConstraint(name: 'favorite_unique', columns: ['student_id', 'module_id'])]
#[ApiResource(
    normalizationContext: ['groups' => ['favorite:read']],
    denormalizationContext: ['groups' => ['favorite:write']]
)]
class Favorite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	#[Groups(['favorite:read', 'favorite:write','student:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favorite')]
	#[Groups(['favorite:read', 'favorite:write'])]
    private ?Student $student = null;

    #[ORM\ManyToOne(inversedBy: 'favorite')]
    #[ORM\JoinColumn(nullable: false)]
	#[Groups(['favorite:read', 'favorite:write'])]
    private ?Module $module = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): static
    {
        $this->module = $module;

        return $this;
    }
}
