<?php

namespace App\Repository;

use App\Entity\Catalogue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CatalogueRepository extends ServiceEntityRepository{
    
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Catalogue::class);
    }
    
    public function simpleSearchCatalogue($criteria)
    {
        return $this->createQueryBuilder('b')
               ->where("b.title LIKE :title")
                ->setParameter("title", "%{$criteria['title']}%")
                ->getQuery()
                ->getResult();
       
    }
    
    public function findByTitle($title)
    {
        return $this->createQueryBuilder('b')
               ->where("b.title LIKE :title")
                 ->setParameter("title", "%{$title}%")
                ->andWhere("b.periodicity = ''")
                ->getQuery()
                ->getResult();
       
    }
    
    public function findMagazinesByTitle($title)
    {
        return $this->createQueryBuilder('b')
               ->where("b.title LIKE :title")
                ->andWhere("b.periodicity !=''")
                ->andWhere("b.periodicity IS NOT NULL")
                ->setParameter("title", "%{$title}%")
                ->getQuery()
                ->getResult();
       
    }
    
    public function advancedSearchCatalogue($criteria)
    {
        $qb =  $this->createQueryBuilder('b')
//                      ->leftJoin('b.authorities','authority')
//                ->where('authority.name = :authorityName')
//                ->setParameter('authorityName', $criteria['authority']->getName())
          ->andwhere("b.title LIKE :title")
          ->andWhere('b.title != :null')->setParameter('null', serialize(null))
          ->andWhere('b.title != :empty')->setParameter('empty', serialize([]))
          ->setParameter("title", "%{$criteria['title']}%")
          ->andwhere("b.publisher LIKE :publisher")
          ->andWhere('b.publisher != :null')->setParameter('null', serialize(null))
          ->andWhere('b.publisher != :empty')->setParameter('empty', serialize([]))
          ->setParameter("publisher", "%{$criteria['publisher']}%")
          ->andwhere("b.yearPublication LIKE :yearPublication")
          ->andWhere('b.yearPublication != :null')->setParameter('null', serialize(null))
          ->andWhere('b.yearPublication != :empty')->setParameter('empty', serialize([]))
          ->setParameter("yearPublication", "%{$criteria['year_publication']}%")
          ->andwhere("b.documentType LIKE :documentType")
          ->andWhere('b.documentType != :null')->setParameter('null', serialize(null)) //not null
           ->andWhere('b.documentType != :empty')->setParameter('empty', serialize([]))
          ->setParameter("documentType", "%{$criteria['document_type']}%")
          ->getQuery();
        //SELECT * FROM authority WHERE (name IS NOT NULL AND name LIKE '%ana%') AND (typeauth IS NOT NULL AND typeauth LIKE '%%') 

        $catalogos = $qb->execute();
        return $catalogos;
    }
    
    public function findById($id)
    {
        $qb = $this->createQueryBuilder('a')
                   ->andWhere("a.id LIKE :id")
                   ->setParameter('id', '%'.$id.'%')
                   ->getQuery();
        
        $authority = $qb->execute();
        return $authority[0];
            
    }
    
    public function customSearchCatalogue($criteria)
    {
        return $this->createQueryBuilder('b')
//                ->leftJoin('b.authorities','authority')
//                ->where('authority.name = .authorityName')
//                ->setParmeter('authorityName', $criteria['authority']->getName())
               ->where("b.title LIKE :title")
                ->setParameter("title", "%{$criteria['title']}%")
//                ->andwhere("b.publisher = :publisher")
//                ->setParameter("publisher", "%{$criteria['publisher']}%")
//                ->andwhere("b.year_publication = :year_publication")
//                ->setParameter("year_publication", "%{$criteria['year_publication']}%")
//                 ->andwhere("b.document_type = :document_type")
//                ->setParameter("document_type", "%{$criteria['document_type']}%")
//                

                ->getQuery()
                ->getResult();
       
    }
    
}