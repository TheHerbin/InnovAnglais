<?php

namespace App\Repository;

use App\Entity\Modalitesdepaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Modalitesdepaiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modalitesdepaiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modalitesdepaiement[]    findAll()
 * @method Modalitesdepaiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModalitesdepaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modalitesdepaiement::class);
    }

    // /**
    //  * @return Modalitesdepaiement[] Returns an array of Modalitesdepaiement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Modalitesdepaiement
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
