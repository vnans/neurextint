<?php

namespace App\Repository;

use App\Entity\Viste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Viste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Viste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Viste[]    findAll()
 * @method Viste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Viste::class);
    }

    // /**
    //  * @return Viste[] Returns an array of Viste objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Viste
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
