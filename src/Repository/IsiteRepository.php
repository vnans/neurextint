<?php

namespace App\Repository;

use App\Entity\Isite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Isite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Isite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Isite[]    findAll()
 * @method Isite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IsiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Isite::class);
    }

    // /**
    //  * @return Isite[] Returns an array of Isite objects
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
    public function findOneBySomeField($value): ?Isite
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
