<?php

namespace App\Repository;

use App\Entity\StudentModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentModule>
 */
class StudentModuleRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, StudentModule::class);
	}


	public function countChapterAndModuleByStudent()
	{
		return $this->createQueryBuilder('sm')
			->select('IDENTITY(sm.student) as studentId')
			->addSelect('COUNT(DISTINCT m.chapter) as numChapters')
			->addSelect('COUNT(DISTINCT sm.module) as numModules')
			->leftJoin('sm.module', 'm')
			->groupBy('sm.student')
			->getQuery()
			->getResult();
	}

	//    /**
//     * @return StudentsModules[] Returns an array of StudentsModules objects
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

	//    public function findOneBySomeField($value): ?StudentsModules
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
