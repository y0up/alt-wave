<?php

namespace App\Repository;

use App\Entity\NeedContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NeedContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method NeedContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method NeedContent[]    findAll()
 * @method NeedContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NeedContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NeedContent::class);
    }

    // /**
    //  * @return NeedContent[] Returns an array of NeedContent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NeedContent
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
