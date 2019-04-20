<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use App\Entity\Catalogue;
//use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController {
  

    public function simple_search(){//mostrar formulario de búsqueda
       
        $form = $this->createFormBuilder(null)
                ->add('query', TextType::class)
                ->add('search', SubmitType::class, [
                    'attr'=>[
                        'class'=>'btn btn-primary'
                    ]
                ])
                ->getForm();
        
        return $this->render('catalogue/simple_search.html.twig', ['form'=>$form->createView()]);
    }
    
    /**
     * 
     * @param \App\Controller\Request $request
     */
    public function result_search(Request $request){
        var_dump($request);
        $result = $this->getDoctrine()
            ->getRepository(Catalogue::class)
            ->findBy(['title' => $request]);


        if ($result) {

        return $this->render('catalogue/result.html.twig',  ['result' => $result]);    

        }else{

        return $this->render('catalogue/result.html.twig', [
            'error' => 'No existen resultados']);

        }
    }
}