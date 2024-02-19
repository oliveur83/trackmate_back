<?php

namespace App\Repository;

use App\Entity\UtilisateurTheme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UtilisateurThemeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UtilisateurTheme::class);
    }

    /**
     * Récupère toutes les entrées de la table UtilisateurTheme.
     *
     * @return UtilisateurTheme[] Retourne un tableau d'objets UtilisateurTheme
     */
    public function findAllUtilisateurThemes(): array
    {
        return $this->createQueryBuilder('ut')
            ->getQuery()
            ->getResult();
    }
    public function utilisateuridThemes($userId): array
    {
        return $this->createQueryBuilder('ut')
            ->where('ut.utilisateur = :userId') // Remplacez "user" par le nom de la propriété représentant l'utilisateur dans votre entité
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }
    
}
