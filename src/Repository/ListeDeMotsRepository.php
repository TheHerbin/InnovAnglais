<?php

namespace App\Repository;

use App\Entity\ListeDeMots;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeDeMots|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeDeMots|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeDeMots[]    findAll()
 * @method ListeDeMots[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeDeMotsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeDeMots::class);
    }

    // /**
    //  * @return ListeDeMots[] Returns an array of ListeDeMots objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeDeMots
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
