<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ItemType;
use App\Entity\Catalogue;
use App\Entity\Item;
use App\Repository\CatalogueRepository;


class ItemController extends AbstractController
{
    /**
     * @Route("/item", name="item")
     */
    public function index()
    {
        return $this->render('item/index.html.twig', [
            'controller_name' => 'ItemController',
        ]);
    }
    
    public function buscar(Request $request, CatalogueRepository $catalogueRepository) 
    {
        $catalogues = null;
        $message = "";
        
        if ($request->isMethod('post'))
        {
            //Cargamos el repositorio
            $title = $request->get('search');
            //REPOSITORIO
            $catalogues = $catalogueRepository->findByTitle($title);
            if (!$catalogues)
            {
                $message = "No se ha encontrado ningun resultado con: " . $title;
            }
        }
        
        return $this->render('item/display_items.html.twig', [
                'catalogues' => $catalogues,
                'message' => $message,
            ]);
    }
    
     public function display_items(Catalogue $catalogo)
    {       
        return $this->render('item/items.html.twig', [
            'controller_name' => 'ItemController',
            'catalogo' => $catalogo,
        ]);
    }
    
    public function create_item(Catalogue $catalogue, Request $request)
    {
          //Crear formulario
        $item = new Item();
        $form = $this->createForm(ItemType::class, $item);
       //  $id_catalogue = $catalogue->getId();
        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $item->setCatalogue($catalogue);
            //Guardamos el item
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            
            
                return $this->render('item/create_item.html.twig', [
            'form' => $form->createView(),
             'create' => true,
                      'catalogue'=> $catalogue
            ]);
        }
             return $this->render('item/create_item.html.twig', [
            'form' => $form->createView(),
             'create' => true,
                 'catalogue'=> $catalogue
            ]);
        
    }
    
    public function edit_item(Request $request, Item $item)
    {
        $form = $this->createForm(ItemType::class, $item);
        $form->handleRequest($request);
        //Rellenar el objeto con los datos del formulario
   
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            
            //Guardamos el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush();
            
            return $this->render('item/create_item.html.twig', [
            'form' => $form->createView(),
             'edit' => true,
            ]);
        }
        
        return $this->render('item/create_item.html.twig', [
            'form' => $form->createView(),
             'edit' => true,
        ]);
    }
    
    public function delete_item(Item $item)
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush();
        
        return $this->render('home/index.html.twig');
    
    }
}
