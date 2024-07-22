<?php

namespace App\Entity;

use App\Repository\StudentModuleRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


#[ORM\Entity(repositoryClass: StudentModuleRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['student_module:read']],
    denormalizationContext: ['groups' => ['student_module:write']]
)]
class StudentModule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
	#[Groups(['student_module:write', 'student_module:read', 'favorite:read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'StudentModule')]
    #[ORM\JoinColumn(nullable: false)]
	#[Groups(['student_module:write', 'student_module:read'])]
    private ?Module $module = null;

    #[ORM\ManyToOne(inversedBy: 'StudentModule')]
    #[ORM\JoinColumn(nullable: false)]
	#[Groups(['student_module:write', 'student_module:read'])]
    private ?Student $student = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): static
    {
        $this->student = $student;

        return $this;
    }
}
