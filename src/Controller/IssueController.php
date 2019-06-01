<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CatalogueRepository;
use App\Service\DataService;
use App\Entity\Catalogue;
use App\Form\IssueType;
use App\Entity\Issue;

class IssueController extends AbstractController
{

    public function issue_ini(Catalogue $catalogue)
    {
        return $this->render('issue/index.html.twig', [
            'controller_name' => 'IssueController',
            'catalogue' => $catalogue,
            'opcion' => 3
        ]);
    }
    
    public function search_issue_ini()
    {
        $paginacion = "";
        $message = "";
        $catalogues = "";

        unset($_SESSION['pag_issue']);
        unset($_SESSION['pag_numero']);
        
        return $this->render('issue/search_issues.html.twig', [
                'paginacion' => $paginacion,
                'catalogues' => $catalogues,
                'message' => $message,
                'opcion' => 3
            ]);
    }
    
    public function search_issue(Request $request, DataService $dataService) 
    {
        $paginacion= null;
        $catalogues = null;
        $message = "";
        if ($request->isMethod('post'))
        {
            $_SESSION['pag_issue'] = $request->get('search');
            $paginacion = $dataService->ReturnDataMagazine($request);
            $catalogues = $paginacion->getItems();
        }else {
            if (isset($_SESSION['pag_issue'])) 
            {
                $request->attributes->set('search',$_SESSION['pag_issue']);
                $paginacion = $dataService->ReturnDataMagazine($request);
                $catalogues = $paginacion->getItems();
            }
        }
        
        return $this->render('issue/search_issues.html.twig', [
                'paginacion' => $paginacion,
                'catalogues' => $catalogues,
                'message' => $message,
                'opcion' => 3
            ]);
    }
    
    public function search_issues(Catalogue $catalogo, Request $request, DataService $dataService)
    {       
        $paginacion= null;
        $catalogues = null;
        $message = "";
        if ($catalogo)
        {
            $_SESSION['pag_numero'] = $catalogo->getId();
            $request->attributes->set('search',$_SESSION['pag_numero']);
            $paginacion = $dataService->ReturnDataIssue($request);
            $issues = $paginacion->getItems();
        } else {
            if (isset($_SESSION['pag_numero'])) 
            {
                $request->attributes->set('search',$_SESSION['pag_numero']);
                $paginacion = $dataService->ReturnDataBook($request);
                $catalogues = $paginacion->getItems();
            }
        }
        
        return $this->render('issue/issues.html.twig', [
            'paginacion' => $paginacion,
            'issues' => $issues,
            'catalogo' => $catalogo,
            'opcion'=>3
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
                      'catalogue'=> $catalogue,
                   'opcion' =>3
            ]);
        }
             return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'create' => true,
                 'catalogue'=> $catalogue,
                 'opcion' =>3
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
                'opcion' =>3
            ]);
        }
        
        return $this->render('issue/create_issue.html.twig', [
            'form' => $form->createView(),
             'edit' => true,
            'opcion' =>3
        ]);
    }
    
    public function delete_issue(Issue $issue)
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($issue);
            $em->flush();
        
        return $this->render('home/index.html.twig');
    
    }
    
    public function detail_issue(Request $request)
    {
        $base_url =  $request->getPathInfo();
         
        $base = explode("/",$base_url);
        $indices = $base[2];
        $array_indices = explode("-", $indices);
        $issue_indice = $array_indices[0];
        $catalogue_indice = $array_indices[1];
        $em = $this->getDoctrine()->getManager(); 
        $issue = $em->getRepository(Issue::class)->find($issue_indice);
        $catalogue = $em->getRepository(Catalogue::class)->find($catalogue_indice);
         

        return $this->render('issue/detail_issue.html.twig', [
            'issue' => $issue,
            'catalogue'=>$catalogue,
            'opcion' =>3
        ]);
    }
}
