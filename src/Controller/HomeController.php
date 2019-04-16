<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
//use App\Entity\Catalogue;
//use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {
  
    public function index(){
       
         return $this->render('home/index.html.twig');
    }
    
//    public function animales($nombre){
//        $title = "Bienvenido a la página de animales";
//        $animales = array('perro', 'gato', 'paloma', 'rata');
//        return $this->render('home/animales.html.twig', [
//            'title'=>$title,
//            'nombre' => $nombre,
//            'animales' => $animales
//        ]);
//    }
//    
    public function redirigir(){
//        return $this->redirectToRoute('animales', [
//            'nombre' => 'Perro'
//        ]);
        
        return $this->redirect("http://elmundo.es");
        
    }
    
}
