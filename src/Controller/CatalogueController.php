<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CatalogueRepository;
use App\Form\CatalogueMagazineType;
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
            
            $_SESSION['catalogue'] = $catalogue;
            
            return $this->render('authority/buscar_autor.html.twig', [
            'autores' => null,
            'message' => "",
            'catalogo' => $catalogue
        ]);
        }
        
        return $this->render('catalogue/register_book.html.twig', [
            'form' => $form->createView()
        ]);
    }
    
    
        public function register_magazine(Request $request)
    {
        //Crear formulario
        $catalogue = new Catalogue();
        $form = $this->createForm(CatalogueMagazineType::class, $catalogue);
        
        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
            
            //Guardamos el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
            $_SESSION['catalogue'] = $catalogue;
            
            return $this->render('authority/buscar_autor.html.twig', [
            'autores' => null,
            'message' => "",
            'catalogo' => $catalogue
        ]);
        }
        
        return $this->render('catalogue/register_magazine.html.twig', [
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

     public function delete_catalogue(Catalogue $catalogue)
    {
        if(!$catalogue) {
            return $this->redirectToRoute('buscar_catalogue');
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($catalogue);
        $em->flush();
        
        return $this->redirectToRoute('buscar_catalogue');
    }
    
        public function edit_catalogue(Request $request, UserInterface $user, Catalogue $catalogue) {
        
//        if (!$user || $user->getId() != $task->getUser()->getId()) {
//            return $this->redirectToRoute('tasks');
//        }
        
        $form = $this->createForm(CatalogueBookType::class, $catalogue);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreateAt(new \DateTime('now'));
            //$task->setUser($user);
            $catalogue->setEditingIdUser($user->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
//            return $this->redirect($this->generateUrl('task_detail', [
//                'id' => $catalogue->getId()
//            ]));
            
            return $this->redirectToRoute('buscar_catalogue');
        }
        
        return $this->render('catalogue/register_book.html.twig', [
            'edit' => true,
            'form' => $form->createView()
        ]);
    }
   

    

    
        

    
}
