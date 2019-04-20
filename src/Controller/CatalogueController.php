<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Catalogue;
//use Symfony\Component\Routing\Annotation\Route;

class CatalogueController extends AbstractController {
  
    public function all_catalogue(){
        $catalogue_repo = $this->getDoctrine()->getRepository(Catalogue::class);
        
        $catalogues = $catalogue_repo->findAll();
        $all_items = [];
        foreach($catalogues as $catalogue) {
              $all_items[] = $catalogue->getItems();
         }
     
        return $this->render('catalogue/entire_catalogue.html.twig', [
            'controller_name' => 'CatalogueController', 'catalogues'=>$catalogues, 'all_items'=>$all_items
        ]);
    }
    
     public function first_catalogue(){
        $catalogue_repo = $this->getDoctrine()->getRepository(Catalogue::class);
  
        $catalogue = $catalogue_repo->findBy(['id'=>'1']);
         foreach($catalogue as $cata) {
              $items = $cata->getItems();
         }
      
        return $this->render('catalogue/first_catalogue.html.twig', [
            'controller_name' => 'CatalogueController',
            'items'=>$items
        ]);
    }
    

//    
    public function redirigir(){
//        return $this->redirectToRoute('animales', [
//            'nombre' => 'Perro'
//        ]);
        
        return $this->redirect("http://elmundo.es");
        
    }
    
}
