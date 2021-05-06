<?php

namespace App\Repository;

use App\Entity\HistoricalCompany;
use App\Entity\HistoricalSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoricalCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoricalCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoricalCompany[]    findAll()
 * @method HistoricalCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoricalCompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoricalCompany::class);
    }

    /**
    * @return HistoricalCompany[] Returns an array of HistoricalCompany objects
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
