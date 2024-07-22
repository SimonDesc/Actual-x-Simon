<?php

namespace App\Controller;


use App\Entity\Chapter;
use App\Repository\ManagerRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Attribute\Template;


class AdminController extends AbstractController
{
	#[Route('/admin', name:'admin_index')]
	#[Template('admin/index.html.twig')]
	public function index(EntityManagerInterface $entityManager, ManagerRepository $managerRepository): array
	{
		$chapters = $entityManager->getRepository(Chapter::class)->findAll();
        $managerWithStatus = $managerRepository->findAllWithStudentStatus();

		return [
			'chapters'=> $chapters,
			'managersWithStatus'=> $managerWithStatus,
		];
	}
}
