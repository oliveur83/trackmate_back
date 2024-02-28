<?php

namespace App\Repository;

use App\Entity\Ue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Ue>
 *
 * @method Ue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ue[]    findAll()
 * @method Ue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ue::class);
    }

    public function add(Ue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Ue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Récupère toutes les Unités d'Enseignement liées à un thème spécifique.
     *
     * @param int $themeId L'ID du thème
     * @return array Liste des Unités d'Enseignement liées au thème
     */
    /**
     * Récupère toutes les Unités d'Enseignement liées à un thème spécifique.
     *
     * @param int $themeId L'ID du thème
     * @return array Liste des Unités d'Enseignement liées au thème
     */
    public function findByThemeId(int $themeId): array
    {
        return $this->createQueryBuilder('ue')

            ->andWhere('ue.id_theme = :themeId')
            ->setParameter('themeId', $themeId)
            ->getQuery()
            ->getResult();
    }
    //    /**
//     * @return Ue[] Returns an array of Ue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    //    public function findOneBySomeField($value): ?Ue
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}