<?php

namespace App\Repository;

use App\Entity\Pos1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pos1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pos1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pos1[]    findAll()
 * @method Pos1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Pos1Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pos1::class);
    }

    // /**
    //  * @return Pos1[] Returns an array of Pos1 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pos1
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
