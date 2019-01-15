<?php

namespace App\Repository;

use App\Entity\Immo;
use App\Entity\BienRecherche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Immo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Immo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Immo[]    findAll()
 * @method Immo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Immo::class);
    }
     
    
    
    public function findByPrix()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.prix > :val1')
            ->setParameter('val1', 1000)
             ->andWhere('p.prix <:val2')
            ->setParameter('val2', 1000000)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(100)
            //->getQuery()
            //->getResult()
        ;
    }
    
    public function findAllVisibleQuery(BienRecherche $recherche){
        
        $query= $this->findByPrix();
        if($recherche->getPrixmax()){
            $query=$query
                    ->andWhere('p.prix<= :prixmax')
                    ->setParameter('prixmax', $recherche->getPrixmax());
        }
        if($recherche->getSurfacemin()){
            $query=$query
                    ->andWhere('p.surface>= :surfacemin')
                    ->setParameter('surfacemin', $recherche->getSurfacemin());
        }
        return $query->getQuery();
    }
    // /**
    //  * @return Immo[] Returns an array of Immo objects
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
    public function findOneBySomeField($value): ?Immo
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
