<?php

namespace App\Controller;

use App\Entity\Manager;
use App\Entity\Student;
use App\Entity\Module;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Attribute\Template;


class ManagerController extends AbstractController
{
	#[Route('/manager', name:'manager_index')]
	#[Template('manager/index.html.twig')]
	public function index(EntityManagerInterface $entityManager): array
	{
		$managers = $entityManager->getRepository(Manager::class)->findAll();
		$students = $entityManager->getRepository(Student::class)->findAll();
		$modules = $entityManager->getRepository(Module::class)->findAll();
		return [
			'managers'=> $managers,
			'students'=> $students,
			'modules'=> $modules,
		];
	}
}
