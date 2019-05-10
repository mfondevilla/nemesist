<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\IssueType;
use App\Entity\Catalogue;
use App\Entity\Issue;
use App\Repository\CatalogueRepository;

class IssueController extends AbstractController
{
    /**
     * @Route("/issue", name="issue")
     */
    public function index()
    {
        return $this->render('issue/index.html.twig', [
            'controller_name' => 'IssueController',
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
            $catalogues = $catalogueRepository->findMagazinesByTitle($title);
            if (!$catalogues)
            {
                $message = "No se ha encontrado ningun resultado con: " . $title;
            }
        }
        
        return $this->render('issue/display_issues.html.twig', [
                'catalogues' => $catalogues,
                'message' => $message,
            ]);
    }
    
     public function display_issues(Catalogue $catalogo)
    {       
        return $this->render('issue/issues.html.twig', [
            'controller_name' => 'IssueController',
            'catalogo' => $catalogo,
        ]);
    }
    
        public function create_issue(Catalogue $catalogue, Request $request)
    {
          //Crear formulario
        $issue = new Issue();
        $form = $this->createForm(IssueType::class, $issue);
         //$id_catalogue = $catalogue->getId();
        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            $issue->setCatalogue($catalogue);
            //Guardamos el item
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();
            
            
               return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'create' => true,
                      'catalogue'=> $catalogue
            ]);
        }
             return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'create' => true,
                 'catalogue'=> $catalogue
            ]);
        
    }
    
      public function edit_issue(Request $request, Issue $issue)
    {
        $form = $this->createForm(IssueType::class, $issue);
        $form->handleRequest($request);
        //Rellenar el objeto con los datos del formulario
   
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            
            //Guardamos el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();
            
            return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'edit' => true,
            ]);
        }
        
        return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'edit' => true,
        ]);
    }
    
        public function delete_issue(Issue $issue)
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($issue);
            $em->flush();
        
        return $this->render('home/index.html.twig');
    
    }
}
