<?php

namespace App\Repository;

use App\Entity\VinyMix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VinyMix>
 *
 * @method VinyMix|null find($id, $lockMode = null, $lockVersion = null)
 * @method VinyMix|null findOneBy(array $criteria, array $orderBy = null)
 * @method VinyMix[]    findAll()
 * @method VinyMix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinyMixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VinyMix::class);
    }

    public function save(VinyMix $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VinyMix $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findAllOrderedByVotes()
    {
        return $this->createQueryBuilder('e')
            ->orderBy('e.votes', 'DESC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return VinyMix[] Returns an array of VinyMix objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VinyMix
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
