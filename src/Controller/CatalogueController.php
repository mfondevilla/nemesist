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
        if(isset($_SESSION['pag_book'])){
            unset($_SESSION['pag_book']);
        }
        
        
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
            if(isset($_SESSION)){
                $_SESSION['pag_book'] = $request->get('search');
            } else {
                session_start();
                $_SESSION['pag_book'] = $request->get('search');
            }
           
          
            $paginacion = $dataService->ReturnDataBook($request );
            $catalogues = $paginacion->getItems();
        } else {
          
                $request->attributes->set('search', $_SESSION['pag_book'] );
                $paginacion = $dataService->ReturnDataBook($request);
                $catalogues = $paginacion->getItems();
           
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
            
            
            return $this->render('catalogue/detail_magazine.html.twig', [
            'catalogue' => $catalogue,
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
      
        $catalogue = new Catalogue();
        //si se ha cargado una imagen se añade a la carpeta item_images
        $fileTmpPath = "";
        if (isset($_FILES['catalogue_book'])) {
            $fileTmpPath = $_FILES['catalogue_book']['tmp_name']['cover'];
            $fileName = $_FILES['catalogue_book']['name']['cover'];
      
            $images_field = "../public/images/item_images/";
            $route = $images_field . $fileName;

            if (move_uploaded_file($fileTmpPath, $route)) {
                $message = 'Se ha cargado bien la imagen';
            } else {
                $message = 'No se ha podido cargar la imagen';
            }

        }
        $form = $this->createForm(CatalogueBookType::class, $catalogue);
        //Rellenar el objeto con los datos del formulario
        $form->handleRequest($request);
        
        //Comprobar si se ha enviado
        if ($form->isSubmitted() && $form->isValid()) {
          //añadimos la ruta de la imagen al catalogo
            if (isset($_FILES['catalogue_book'])) {
                $catalogue->setCover($fileName);
            }
            //Guardamos el usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
         //   $_SESSION['catalogue'] = $catalogue;
            
            return $this->render('catalogue/detail_book.html.twig', [
          
            'message' => "",
            'catalogue' => $catalogue,
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
                'opcion' => 3,
                'catalogues'=>null
            ]);
    }
    
    public function edit_catalogue(Request $request, Catalogue $catalogue, UserInterface $user) 
    {

        $form = $this->createForm(CatalogueBookType::class, $catalogue);
        $form->handleRequest($request);
        $fileTmpPath = "";
        if (isset($_FILES['catalogue_book'])) {
                    $fileTmpPath = $_FILES['catalogue_book']['tmp_name']['cover'];
                    $fileName = $_FILES['catalogue_book']['name']['cover'];

                    $images_field = "../public/images/item_images/";
                    $route = $images_field . $fileName;

                    if (move_uploaded_file($fileTmpPath, $route)) {
                        $message = 'Se ha cargado bien la imagen';
                    } else {
                        $message = 'No se ha podido cargar la imagen';
                    }

                }
        if ($form->isSubmitted() && $form->isValid()) {
              
          if (isset($_FILES['catalogue_book'])) {
                $catalogue->setCover($fileName);
            }
            $catalogue->setEditingIdUser($user->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();

          return $this->render('catalogue/detail_book.html.twig', [
                'opcion' => 3,
                'catalogue'=>$catalogue,
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
    
      public function edit_magazine(Request $request, Catalogue $catalogue, UserInterface $user) 
    {

        $form = $this->createForm(CatalogueMagazineType::class, $catalogue);
        $form->handleRequest($request);
        $fileTmpPath = "";
        if (isset($_FILES['catalogue_book'])) {
                    $fileTmpPath = $_FILES['catalogue_book']['tmp_name']['cover'];
                    $fileName = $_FILES['catalogue_book']['name']['cover'];

                    $images_field = "../public/images/item_images/";
                    $route = $images_field . $fileName;

                    if (move_uploaded_file($fileTmpPath, $route)) {
                        $message = 'Se ha cargado bien la imagen';
                    } else {
                        $message = 'No se ha podido cargar la imagen';
                    }

                }
        if ($form->isSubmitted() && $form->isValid()) {
              
          if (isset($_FILES['catalogue_book'])) {
                $catalogue->setCover($fileName);
            }
            $catalogue->setEditingIdUser($user->getId());
            $em = $this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();

          return $this->render('catalogue/detail_magazine.html.twig', [
                'opcion' => 3,
                'catalogue'=>$catalogue,
                'message'=>'',
            ]);
        }
        
        return $this->render('catalogue/register_magazine.html.twig', [
            'edit' => true,
            'form' => $form->createView(),
            'catalogues'=>$catalogue,
            'opcion' => 3
        ]);
    }
    
    
    
}
