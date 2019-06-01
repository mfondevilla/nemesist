<?php

namespace App\Repository;

use App\Entity\Issue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class IssueRepository extends ServiceEntityRepository{
    
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Issue::class);
    }
  
    
    public function findByIssueId($issue_id)
    {
        return $this->createQueryBuilder('b')
               ->where("b.id = id")
                 ->setParameter("id", "%{$id}%")
                ->andWhere("b.periodicity = ''")
                ->getQuery()
                ->getResult();
       
    }

    
  
    
}