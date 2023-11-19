<?php

namespace App\Repository;

use App\Entity\Tld;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tld>
 *
 * @method Tld|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tld|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tld[]    findAll()
 * @method Tld[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tld::class);
    }

//    /**
//     * @return Tld[] Returns an array of Tld objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tld
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
