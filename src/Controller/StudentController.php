<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use App\Repository\StudentModuleRepository;
use App\Repository\FavoriteRepository;
use App\Entity\Student;
use App\Entity\StudentModule;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Component\HttpFoundation\JsonResponse;


class StudentController extends AbstractController
{
	#[Route('/student', name: 'student_index')]
	#[Template('student/index.html.twig')]
	public function index(StudentModuleRepository $StudentModuleRepository, EntityManagerInterface $entityManager): array
	{
		$studentsmodules = $entityManager->getRepository(StudentModule::class)->findAll();
		$students = $entityManager->getRepository(Student::class)->findAll();
		$chaptersAndModules = $StudentModuleRepository->countChapterAndModuleByStudent();

		$studentsWithCounts = [];
		foreach ($students as $student) {
			$studentId = $student->getId();
			$numChapters = 0;
			$numModules = 0;

			// find matching id for studentModule and student
			foreach ($chaptersAndModules as $countData) {
				if ($countData['studentId'] == $studentId) {
					$numChapters = $countData['numChapters'];
					$numModules = $countData['numModules'];
					break;
				}
			}

			$studentsWithCounts[] = [
				'id' => $studentId,
				'username' => $student->getUsername(),
				'firstname' => $student->getFirstname(),
				'lastname' => $student->getLastname(),
				'email' => $student->getEmail(),
				'phoneNumber' => $student->getPhoneNumber(),
				'manager' => $student->getManager() ? $student->getManager()->getName() : 'sans manager',
				'numChapters' => $numChapters,
				'numModules' => $numModules
			];
		}

		// Regrouper les modules par chapitre
		$chapters = [];
		foreach ($studentsmodules as $studentmodule) {
			$chapterTitle = $studentmodule->getModule()->getChapter()->getTitle();
			if (!isset($chapters[$chapterTitle])) {
				$chapters[$chapterTitle] = [];
			}
			$chapters[$chapterTitle][] = $studentmodule;
		}

		return [
			'students' => $studentsWithCounts,
			'studentsmodules' => $studentsmodules,
			'chapters' => $chapters,
		];
	}

	#[Route('/api/students/by-manager/{managerId}', name: 'student_by_manager')]
	public function getStudentsByManager(StudentRepository $studentRepository, $managerId): JsonResponse
	{
		$students = $studentRepository->findByManagerId($managerId);

		return $this->json($students, 200, [], ['groups' => 'student:read']);
	}

	#[Route('/api/students/{studentId}/favorites', name: 'favorites_by_student')]
	public function getFavoritesByStudent(FavoriteRepository $favoriteRepository, $studentId): JsonResponse
	{
		$favorites = $favoriteRepository->findBy(['student' => $studentId]);

		return $this->json($favorites, 200, [], ['groups' => 'favorite:read']);
	}

}
