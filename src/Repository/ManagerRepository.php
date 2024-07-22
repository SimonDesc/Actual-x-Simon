<?php

namespace App\Repository;

use App\Entity\Manager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Manager>
 */
class ManagerRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Manager::class);
	}

	// Retrieve the managers and show if it have student(s) or not
	public function findAllWithStudentStatus(): array
	{
		$qb = $this->createQueryBuilder('manager')
			->leftJoin('manager.student', 'student')
			->addSelect('manager', 'COUNT(student.id) AS studentCount')
			->groupBy('manager.id')
			->orderBy('manager.name', 'ASC');

		$results = $qb->getQuery()->getArrayResult();


		// Append the manager with additional property `hasStudents`
		$transformedResults = [];
		foreach ($results as $result) {
			$manager = $result[0];
			$studentCount = $result['studentCount'];
			$hasStudents = $studentCount > 0;

			$transformedResults[] = [
				'manager' => $manager,
				'hasStudents' => $hasStudents
			];
		}

		return $transformedResults;
	}

	//    /**
//     * @return Managers[] Returns an array of Managers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

	//    public function findOneBySomeField($value): ?Managers
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
