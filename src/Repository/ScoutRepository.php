<?php

namespace App\Repository;

use App\Entity\Scout;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scout|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scout|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scout[]    findAll()
 * @method Scout[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Scout::class);
    }

    // /**
    //  * @return Scout[] Returns an array of Scout objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scout
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
