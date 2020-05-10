<?php

namespace App\Repository;

use App\Entity\Whatever;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Whatever|null find($id, $lockMode = null, $lockVersion = null)
 * @method Whatever|null findOneBy(array $criteria, array $orderBy = null)
 * @method Whatever[]    findAll()
 * @method Whatever[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhateverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Whatever::class);
    }

    // /**
    //  * @return Whatever[] Returns an array of Whatever objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Whatever
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
