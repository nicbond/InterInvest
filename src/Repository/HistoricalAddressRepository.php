<?php

namespace App\Repository;

use App\Entity\HistoricalAddress;
use App\Entity\HistoricalSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoricalAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoricalAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoricalAddress[]    findAll()
 * @method HistoricalAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoricalAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoricalAddress::class);
    }

    /**
    * @return HistoricalAddress[] Returns an array of HistoricalAddress objects
    */
    public function findByCompanyAndDate($id, HistoricalSearch $search)
    {
        $query = $this->createQueryBuilder('h')
            ->Where('h.company = :id')
            ->setParameter('id', $id);

        if ($search->getCreatedAt()) {
            $query = $query
                ->andWhere('h.created_at <= :searchDate')
                ->setParameter('searchDate', $search->getCreatedAt()->format('Y-m-d H:i:s'));
        }

        return $query->getQuery()->getResult();
    }
}
