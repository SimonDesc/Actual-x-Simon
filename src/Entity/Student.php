<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['student:read']],
    denormalizationContext: ['groups' => ['student:write']]
)]
class Student
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	#[Groups(['student:read', 'student:write', 'favorite:read'])]
	private ?int $id = null;

	#[ORM\Column(length: 255)]
	#[Groups(['student:read', 'student:write'])]
	private ?string $username = null;

	#[ORM\Column(length: 255)]
	#[Groups(['student:read', 'student:write'])]
	private ?string $firstname = null;

	#[ORM\Column(length: 255)]
	#[Groups(['student:read', 'student:write'])]
	private ?string $lastname = null;

	#[ORM\Column(length: 255)]
	#[Groups(['student:read', 'student:write'])]
	private ?string $email = null;

	#[ORM\Column(length: 255, nullable: true)]
	#[Groups(['student:read', 'student:write'])]
	private ?string $phone_number = null;

	#[ORM\ManyToOne(targetEntity: Manager::class, inversedBy: 'student')]
	#[ORM\JoinColumn(nullable: true)]
	#[Groups(['student:read', 'student:write'])]
	private $manager;

	/**
	 * @var Collection<int, Favorite>
	 */
	#[ORM\OneToMany(targetEntity: Favorite::class, mappedBy: 'student')]
	#[Groups(['student:read'])]
	private Collection $favorite;

	/**
	 * @var Collection<int, StudentModule>
	 */
	#[ORM\OneToMany(targetEntity: StudentModule::class, mappedBy: 'student', orphanRemoval: true)]
	#[Groups(['student:read'])]
	private Collection $StudentModule;

	public function __construct()
	{
		$this->favorite = new ArrayCollection();
		$this->StudentModule = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getUsername(): ?string
	{
		return $this->username;
	}

	public function setUsername(string $username): static
	{
		$this->username = $username;

		return $this;
	}

	public function getFirstname(): ?string
	{
		return $this->firstname;
	}

	public function setFirstname(string $firstname): static
	{
		$this->firstname = $firstname;

		return $this;
	}

	public function getLastname(): ?string
	{
		return $this->lastname;
	}

	public function setLastname(string $lastname): static
	{
		$this->lastname = $lastname;

		return $this;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function setEmail(string $email): static
	{
		$this->email = $email;

		return $this;
	}

	public function getPhoneNumber(): ?string
	{
		return $this->phone_number;
	}

	public function setPhoneNumber(?string $phone_number): static
	{
		$this->phone_number = $phone_number;

		return $this;
	}

	public function getManager(): ?Manager
	{
		return $this->manager;
	}

	public function setManager(?Manager $manager): self
	{
		$this->manager = $manager;

		return $this;
	}

	/**
	 * @return Collection<int, Favorite>
	 */
	public function getfavorite(): Collection
	{
		return $this->favorite;
	}

	public function addFavorite(Favorite $favorite): static
	{
		if (!$this->favorite->contains($favorite)) {
			$this->favorite->add($favorite);
			$favorite->setStudent($this);
		}

		return $this;
	}

	public function removeFavorite(Favorite $favorite): static
	{
		if ($this->favorite->removeElement($favorite)) {
			// set the owning side to null (unless already changed)
			if ($favorite->getStudent() === $this) {
				$favorite->setStudent(null);
			}
		}

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
			$StudentModule->setStudent($this);
		}

		return $this;
	}

	public function removeStudentModule(StudentModule $StudentModule): static
	{
		if ($this->StudentModule->removeElement($StudentModule)) {
			// set the owning side to null (unless already changed)
			if ($StudentModule->getStudent() === $this) {
				$StudentModule->setStudent(null);
			}
		}

		return $this;
	}
}
