<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CatalogueRepository;
use App\Form\CatalogueBookType;
use App\Entity\Catalogue;
use App\Entity\Authority;


class CatalogueController extends AbstractController
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function index()
    {
        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }
    
     public function register_book(Request $request)//, UserInterface $user
    {
        //Crear formulario
        $catalogue = new Catalogue();
        $form = $this->createForm(CatalogueBookType::class, $catalogue);
        
        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            
            //Guardamos el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
            return $this->redirect($this->generateUrl('register_book_autor', [
                'id' => $catalogue->getId()
            ]));
        }
        
        return $this->render('catalogue/register_book.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    public function register_book_autor(catalogue $catalogue)
    {
        if (!$catalogue) 
        {
            return $this->redirectToRoute('login');
        }
        
        //$em = $this->getDoctrine()->getManager();
        $autor_repo = $this->getDoctrine()->getRepository(Authority::class);
        $autores = $autor_repo->findAll();
        
        return $this->render('catalogue/register_book_autor.html.twig', [
            'autores' => $autores
        ]);
    }
    
    public function register_book_autor_action(Request $request)
    {
        
        
        if (!isset($_SESSION['authors']))
        {
            $authors = $_SESSION['authors'];
        } 
        
        return $this->render('catalogue/register_book.html.twig', [
            'form' => $form->createView()
        ]);
    }
    

    
    public function new_catalogue(Request $request){
       
         // creates a task and gives it some dummy data for this example
        $catalogue = new Catalogue();
        $catalogue->setCreationIdUser($_SESSION['user-id']);
        
        $form = $this->createFormBuilder($catalogue)
            ->add('title', TextType::class)
            ->add('subtitle', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Nuevo'])
            ->getForm();

        return $this->render('catalogue/new.html.twig', [
            'form' => $form->createView(),
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
        
        return $this->render('catalogue/asign_book_autor.html.twig', [
                'catalogues' => $catalogues,
                'message' => $message,
            ]);
    }
    
    public function search(Request $request){
       
        $catalogue = new Catalogue();
                    
        $form = $this->createform(RegisterType::class, $catalogue);
        $form->handleRequest($request);
         if($form->isSubmitted() && $form->isValid()){
             
         }
     
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {

        $title = $request->get('title');

        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('ComunicacionBundle:Departamentos ')->findOneBy(array('slug' => $title));

        return $this->render('catalogue/search_catalogue.html.twig',  [
          'form'=>$form->createView()
        ]);
    }
    }


    
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
    
        

    
}
