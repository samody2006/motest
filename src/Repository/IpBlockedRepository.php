<?php

namespace App\Repository;

use App\Entity\IpBlocked;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IpBlocked|null find($id, $lockMode = null, $lockVersion = null)
 * @method IpBlocked|null findOneBy(array $criteria, array $orderBy = null)
 * @method IpBlocked[]    findAll()
 * @method IpBlocked[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IpBlockedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IpBlocked::class);
    }

    // /**
    //  * @return IpBlocked[] Returns an array of IpBlocked objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IpBlocked
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
