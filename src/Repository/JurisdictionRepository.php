<?php

namespace App\Repository;

use App\Entity\Jurisdiction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Jurisdiction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jurisdiction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jurisdiction[]    findAll()
 * @method Jurisdiction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JurisdictionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jurisdiction::class);
    }

    // /**
    //  * @return Jurisdiction[] Returns an array of Jurisdiction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jurisdiction
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
