<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Catalogue;
use App\Entity\Authority;
use App\Entity\Issue;

class DataService {
    
    protected $em;
    protected $container;
    
    public function __construct(EntityManagerInterface $entityManager, ContainerInterface $container) {
        $this->em = $entityManager;
        $this->container = $container;
    }        
    
    public function ReturnDataBook(Request $request) {
        $em = $this->em;
        $container = $this->container;
        $title = $request->get('search');

        $paginator = $container->get('knp_paginator');

        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Catalogue::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $qb = $appointmentsRepository->createQueryBuilder('a')
                   ->Where("a.title LIKE :title")
                   ->setParameter('title', '%'.$title.'%')
                   ->andWhere("a.periodicity = ''")
                   ->getQuery();
        
        // Paginate the results of the query
        $result = $paginator->paginate(
            // Doctrine Query, not results
            $qb,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5)
        );
        
        return ($result);
    }
    
    public function ReturnDataMagazine(Request $request) {
        $em = $this->em;
        $container = $this->container;
        $title = $request->get('search');

        $paginator = $container->get('knp_paginator');

        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Catalogue::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $qb = $appointmentsRepository->createQueryBuilder('a')
                   ->Where("a.title LIKE :title")
                   ->setParameter('title', '%'.$title.'%')
                ->andWhere("a.periodicity != ''")
                   ->getQuery();
        
        // Paginate the results of the query
        $result = $paginator->paginate(
                // Doctrine Query, not results
                $qb,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5)
        );
        
        return ($result);
    }
    
    public function ReturnDataIssue(Request $request) {
        $em = $this->em;
        $container = $this->container;
        $id = $request->get('search');

        $paginator = $container->get('knp_paginator');

        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Issue::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $qb = $appointmentsRepository->createQueryBuilder('a')
                   ->Where("a.catalogue = :id")
                   ->setParameter('id', $id)
                   ->getQuery();
        
        // Paginate the results of the query
        $result = $paginator->paginate(
                // Doctrine Query, not results
                $qb,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5)
        );
        
        return ($result);
    }
    
    public function ReturnDataAuthority(Request $request) {
        $em = $this->em;
        $container = $this->container;
        $name = $request->get('search');

        $paginator = $container->get('knp_paginator');

        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Authority::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $qb = $appointmentsRepository->createQueryBuilder('a')
                   ->Where("a.name LIKE :name")
                   ->setParameter('name', '%'.$name.'%')
                   ->getQuery();
        
        // Paginate the results of the query
        $result = $paginator->paginate(
            // Doctrine Query, not results
            $qb,
            $request->query->getInt('page', 1),
            $request->query->getInt('limit', 5)
        );
        
        return ($result);
    }
    
    public function ReturnDataGeneric(Request $request) {
        $em = $this->em;
        $container = $this->container;
        $title = $request->get('search');

        $paginator = $container->get('knp_paginator');

        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Catalogue::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $qb = $appointmentsRepository->createQueryBuilder('a')
                   ->Where("a.title LIKE :title")
                   ->setParameter('title', '%'.$title.'%')
                   ->getQuery();
        
        // Paginate the results of the query
        $result = $paginator->paginate(
                // Doctrine Query, not results
                $qb,
                $request->query->getInt('page', 1),
                $request->query->getInt('limit', 5)
        );
        
        return ($result);
    }
}