<?php

namespace App\Repository;

use App\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Student>
 */
class StudentRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Student::class);
	}

	/**
	 * @return Student[] Returns an array of Student objects filtered by manager ID
	 */
	public function findByManagerId($managerId)
	{
		return $this->createQueryBuilder('s')
			->andWhere('s.manager = :managerId')
			->setParameter('managerId', $managerId)
			->getQuery()
			->getResult();
	}


	//    /**
//     * @return Students[] Returns an array of Students objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

	//    public function findOneBySomeField($value): ?Students
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
