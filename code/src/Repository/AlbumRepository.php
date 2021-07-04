<?php

namespace App\Repository;

use App\Entity\AlbumRow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AlbumRow|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumRow|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumRow[]    findAll()
 * @method AlbumRow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumRow::class);
    }
}
