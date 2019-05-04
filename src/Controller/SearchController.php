<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CatalogueRepository;
use App\Form\SimplesearchType;
use App\Form\AdvancedSearchType;
use App\Entity\Catalogue;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index()
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    

    public function simplesearch(Request $request, CatalogueRepository $catalogueRepository){
        
        $simplesearchForm = $this->createForm(SimplesearchType::class);
        if($simplesearchForm->handleRequest($request)->isSubmitted() && $simplesearchForm->isValid()){
          $criteria = $simplesearchForm->getData();
        //  dd($criteria);
          
            $catalogues = $catalogueRepository->simpleSearchCatalogue($criteria);
              dd($catalogues);
        }
        return $this->render('search/simple_search.html.twig',[
            'search_form' => $simplesearchForm->createView(),
        ]);
    }
    
    
    public function advancedSearch(Request $request, CatalogueRepository $catalogueRepository){
        
        $advancedSearchForm = $this->createForm(AdvancedSearchType::class);
        if($advancedSearchForm->handleRequest($request)->isSubmitted() && $advancedSearchForm->isValid()){
          $criteria = $advancedSearchForm->getData();
         // dd($criteria);
          
            $catalogues = $catalogueRepository->advancedSearchCatalogue($criteria);
              dd($catalogues);
        }
        return $this->render('search/advanced_search.html.twig',[
            'search_form' => $advancedSearchForm->createView(),
        ]);
    }
     public function customSearch(Request $request, CatalogueRepository $catalogueRepository){
        
        $customSearchForm = $this->createForm(AdvancedSearchType::class);
        if($customSearchForm->handleRequest($request)->isSubmitted() && $customSearchForm->isValid()){
          $criteria = $customSearchForm->getData();
        //  dd($criteria);
          
            $catalogues = $catalogueRepository->advancedSearchCatalogue($criteria);
              dd($catalogues);
        }
        return $this->render('search/custom_search.html.twig',[
            'search_form' => $customSearchForm->createView(),
        ]);
    }
    
  
}
