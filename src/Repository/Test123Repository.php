<?php

namespace App\Repository;

use App\Entity\Test123;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Test123|null find($id, $lockMode = null, $lockVersion = null)
 * @method Test123|null findOneBy(array $criteria, array $orderBy = null)
 * @method Test123[]    findAll()
 * @method Test123[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Test123Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Test123::class);
    }

    // /**
    //  * @return Test123[] Returns an array of Test123 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Test123
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
