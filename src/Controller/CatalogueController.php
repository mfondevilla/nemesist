<?php

namespace App\Controller;
use App\Entity\Catalogue;
//use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Form\CatalogueType;

class CatalogueController extends AbstractController {

    public function index(){
        
        return $this->render('catalogue/index.html.twig', [
            'welcome' => 'Bienvenido al Catálogo'
        ]);
    }
    
    public function newCatalogueItem(Request $request){
        $catalogue = new Catalogue();
        $form = $this->createForm(CatalogueType::class, $catalogue);
                //->setAction($this->generateUrl('guardar_catalogo'))
               
                  
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
            //session flash
            $session = new Session();
            //$session->start();
            $session->getFlashBag()->add('message', 'Se ha guardado correctamente');
            return $this->redirectToRoute('nuevo_catalogo');
        }
              
        return $this->render('catalogue/new-catalogue.html.twig', [
            'form' => $form->createView()
        ]);
                
    }
    
    public function catalogue_save(){
       return $this->render('catalogue/index.html.twig');
        
    }
}
