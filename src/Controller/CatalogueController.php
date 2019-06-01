<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CatalogueMagazineType;
use App\Form\CatalogueBookType;
use App\Service\DataService;
use App\Entity\Catalogue;
use App\Entity\Authority;


class CatalogueController extends AbstractController
{

    public function search_catalogue_ini()
    {
        $paginacion = "";
        $message = "";
        $catalogues = "";
        
        unset($_SESSION['pag_book']);
        
        return $this->render('catalogue/asign_book_autor.html.twig', [
                'paginacion' => $paginacion,
                'catalogues' => $catalogues,
                'message' => $message,
                'opcion' => 3
            ]);
    }
    
    public function search_catalogue(Request $request, DataService $dataService) 
    {
        $paginacion= null;
        $catalogues = null;
        $message = "";
        if ($request->isMethod('post'))
        {
            $_SESSION['pag_book'] = $request->get('search');
            $paginacion = $dataService->ReturnDataBook($request);
            $catalogues = $paginacion->getItems();
        } else {
            if (isset($_SESSION['pag_book'])) 
            {
                $request->attributes->set('search',$_SESSION['pag_book']);
                $paginacion = $dataService->ReturnDataBook($request);
                $catalogues = $paginacion->getItems();
            }
        }
        
        return $this->render('catalogue/asign_book_autor.html.twig', [
                'paginacion' => $paginacion,
                'catalogues' => $catalogues,
                'message' => $message,
                'opcion' => 3
        ]);
    }
    
    public function book_detail(Catalogue $catalogue){
        
        return $this->render('catalogue/detail_book.html.twig', [
            'catalogue' => $catalogue,
            'opcion'=>3
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
            'catalogo' => $catalogue,
            'opcion' => 3
        ]);
        }
        
        return $this->render('catalogue/register_magazine.html.twig', [
            'form' => $form->createView(),
            'opcion' => 3
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
            'catalogo' => $catalogue,
            'opcion' => 3
        ]);
        }
        
        return $this->render('catalogue/register_book.html.twig', [
            'form' => $form->createView(),
            'opcion' => 3
        ]);
    }
    
    public function delete_catalogue(Catalogue $catalogue)
    {
        if(!$catalogue) {
               return $this->render('catalogue/asign_book_autor.html.twig', [
                'message' => "Libro no encontrado",
                'opcion' => 3
            ]);
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($catalogue);
        $em->flush();
        
        return $this->render('catalogue/asign_book_autor.html.twig', [
                'message' => "Libro eliminado correctamente",
                'opcion' => 3
            ]);
    }
    
    public function edit_catalogue(Request $request, Catalogue $catalogue, UserInterface $user) 
    {
        
//        if (!$user || $user->getId() != $task->getUser()->getId()) {
//            return $this->redirectToRoute('tasks');
//        }
//        $id_catalogue = $catalogue->getId();
        $catalogues = null;
        $form = $this->createForm(CatalogueBookType::class, $catalogue);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreateAt(new \DateTime('now'));
            //$task->setUser($user);
            $catalogue->setEditingIdUser($user->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();

          return $this->render('catalogue/asign_book_autor.html.twig', [
                'opcion' => 3,
                'catalogues'=>$catalogues,
                'message'=>'',
            ]);
        }
        
        return $this->render('catalogue/register_book.html.twig', [
            'edit' => true,
            'form' => $form->createView(),
            'catalogues'=>$catalogue,
            'opcion' => 3
        ]);
    }
    
//    public function new_catalogue(Request $request){
//       
//         // creates a task and gives it some dummy data for this example
//        $catalogue = new Catalogue();
//        $catalogue->setCreationIdUser($_SESSION['user-id']);
//        
//        $form = $this->createFormBuilder($catalogue)
//            ->add('title', TextType::class)
//            ->add('subtitle', DateType::class)
//            ->add('save', SubmitType::class, ['label' => 'Nuevo'])
//            ->getForm();
//
//        return $this->render('catalogue/new.html.twig', [
//            'form' => $form->createView(),
//            'opcion'=>3
//        ]);
//    }
    
    
//    public function search(Request $request)
//    {
//       
//        $catalogue = new Catalogue();
//                    
//        $form = $this->createform(RegisterType::class, $catalogue);
//        $form->handleRequest($request);
//        if($form->isSubmitted() && $form->isValid()){
//             
//        }
//     
//        $request = $this->getRequest();
//        if ($request->getMethod() == 'POST') {
//
//            $title = $request->get('title');
//
//            $em = $this->getDoctrine()->getManager();
//
//            $book = $em->getRepository('ComunicacionBundle:Departamentos ')->findOneBy(array('slug' => $title));
//
//            return $this->render('catalogue/search_catalogue.html.twig',  [
//              'form'=>$form->createView(),
//                'opcion'=>3
//            ]);
//        }
//    }

//    public function register_book_autor(catalogue $catalogue)
//    {
//        if (!$catalogue) 
//        {
//            return $this->redirectToRoute('login');
//        }
//        
//        //$em = $this->getDoctrine()->getManager();
//        $autor_repo = $this->getDoctrine()->getRepository(Authority::class);
//        $autores = $autor_repo->findAll();
//        
//        return $this->render('catalogue/register_book_autor.html.twig', [
//            'autores' => $autores,
//            'opcion'=>3
//        ]);
//    }
    
//    public function register_book_autor_action(Request $request)
//    {
//        
//        
//        if (!isset($_SESSION['authors']))
//        {
//            $authors = $_SESSION['authors'];
//        } 
//        
//        return $this->render('catalogue/register_book.html.twig', [
//            'form' => $form->createView(),
//            'opcion'=>3
//        ]);
//    }
    
    
}
