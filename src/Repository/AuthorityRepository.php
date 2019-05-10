<?php

namespace App\Repository;

use App\Entity\Authority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AuthorityRepository extends ServiceEntityRepository{
    
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Authority::class);
    }
    
    public function findByName($name)
    {
        $qb = $this->createQueryBuilder('a')
                   ->andWhere("a.name LIKE :name")
                   ->setParameter('name', '%'.$name.'%')
                   ->getQuery();
        
        $authorities = $qb->execute();
        return $authorities;
            
    }
    
    public function findByNameForBook($name)
    {
        $qb = $this->createQueryBuilder('a')
                   ->andWhere("a.name LIKE :name")
                   ->andWhere("a.typeauth != 'Editoriales'")
                   ->setParameter('name', '%'.$name.'%')
                   //->orderBy('a.id', $order)
                   ->getQuery();
        
        $autores = $qb->execute();
        return $autores;
    }
  
    
}