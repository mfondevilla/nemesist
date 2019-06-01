<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AuthorityRepository;
use App\Service\DataService;
use App\Form\AuthorityType;
use App\Entity\Authority;
use App\Entity\Catalogue;

class AuthorityController extends AbstractController {

    public function index() {
        return $this->render('authority/index.html.twig', [
                    'controller_name' => 'AuthorityController',
                    'opcion' => 3
        ]);
    }

    public function search_authority_ini() {
        unset($_SESSION['pag_auth']);
        return $this->render('authority/search_author.html.twig', [
                    'authorities' => null,
                    'message' => "",
                    'opcion' => 3
        ]);
    }
    
    public function buscar_autor_ini(Catalogue $catalogo) {
        
        $_SESSION['catalogue'] = $catalogo;
        foreach ($catalogo->getAuthority() as $author) {
            if ($autor->getId() == $author->getId()) {
                $encontrado = true;
            }
        }
        return $this->render('authority/asign_author.html.twig', [
                    'authorities' => null,
                    'message' => "",
                    'catalogo' => $catalogo,
                    'opcion' => 3
        ]);
    }
    
    public function buscar(Request $request, DataService $dataService) {
        if ($request->isMethod('post')) {
            //Cargamos el repositorio
            $paginacion = $dataService->ReturnDataAuthority($request);
            $autores = $paginacion->getItems();
            $message = "";
            $autores_filtro = [];
            //$_SESSION['catalogue'] = $catalogo;
            $catalogo = $_SESSION['catalogue'];
            if (!$autores) {
                $message = "No se ha encontrado ningun resultado con: " . $name;
            } else {//$autores && isset($_SESSION['authors'])
                foreach ($autores as $autor) {
                    $encontrado = false;
                    foreach ($catalogo->getAuthority() as $author) {
                        if ($autor->getId() == $author->getId()) {
                            $encontrado = true;
                        }
                    }
                    if (!$encontrado) {
                        $autores_filtro[] = $autor;
                    }
                }
            }
            if (isset($autores_filtro)) {
                $autores = $autores_filtro;
            }

            return $this->render('authority/asign_author.html.twig', [
                'paginacion' => $paginacion,
                'authorities' => $autores,
                'message' => $message,
                'catalogo' => $catalogo,
                'opcion' => 3
            ]);
        }

        return $this->render('authority/asign_author.html.twig', [
                    'authorities' => null,
                    'message' => "",
                    'catalogo' => $catalogo,
                    'opcion' => 3
        ]);
    }

    //en el caso de las relaciones si pasamos el objeto por parámetro al hacer persist lo guardará como un nuevo
//    registro en la base de datos. Debemos recuperar el objeto del propio repositorio ya que al proceder de doctrine
//           detecta que viene de un registro de la base de datos y entonces no persistira/duplicará el objeto
//            guardando únicamente la relación (en el caso de querer registrar una relación entre objetos existentes en la bdd)
    //en el caso de que existiera una de las entidades no hace falta recuperar los objetos del repositorio. Se hace un add
    // del objeto que existe (al que no existe) y al persistir se persiste el que no existe y la relación correspondiente
    public function asign_autor(Authority $author) {
        $catalogue = null;
        if (!$author) {
            return $this->redirectToRoute('search_author');
        }
        if (isset($_SESSION['catalogue'])) {
            $catalogue_session = $_SESSION['catalogue'];
            $em = $this->getDoctrine()->getManager();
            $repository_cat = $this->getDoctrine()->getRepository(Catalogue::Class);
            $repository_aut = $this->getDoctrine()->getRepository(Authority::Class);

            $catalogues = $repository_cat->findBy([
                'id' => $catalogue_session->getId()
            ]);
            $authorities = $repository_aut->findBy([
                'id' => $author->getId()
            ]);
            $catalogue = $catalogues[0];
            $authority = $authorities[0];

            $catalogue->addAuthority($authority);
            $em->persist($catalogue);
            $em->flush();

            return $this->render('catalogue/detail_book.html.twig', [
                'catalogue' => $catalogue,
                'opcion'=>3
            ]);
        }

        return $this->render('authority/search_author.html.twig', [
                    'authorities' => null,
                    'message' => "",
                    'opcion' => 3
        ]);
    }

    public function asign_authors(Catalogue $catalogo) {
        return $this->render('authority/search_author.html.twig', [
                    'controller_name' => 'AuthorityController',
                    'autores' => null,
                    'message' => "",
                    'catalogo' => $catalogo,
        ]);
    }

    public function search_author(Request $request, DataService $dataService) {
        
        $paginacion= null;
        $authorities = null;
        $message = "";
        if ($request->isMethod('post'))
        {
            $_SESSION['pag_auth'] = $request->get('search');
            $paginacion = $dataService->ReturnDataAuthority($request);
            $authorities = $paginacion->getItems();
        } else {
            if (isset($_SESSION['pag_auth'])) 
            {
                $request->attributes->set('search',$_SESSION['pag_auth']);
                $paginacion = $dataService->ReturnDataAuthority($request);
                $authorities = $paginacion->getItems();
            }
        }
        
        return $this->render('authority/search_author.html.twig', [
                'paginacion' => $paginacion,
                'authorities' => $authorities,
                'message' => $message,
                'opcion' => 3
        ]);
    }

    public function register_author(Request $request) {

        $authority = new Authority();
        $form = $this->createForm(AuthorityType::class, $authority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($authority);
            $em->flush();

            return $this->redirect($this->generateUrl('register_author'));
        }

        return $this->render('authority/register_author.html.twig', [
                    'form' => $form->createView(),
                    'opcion' => 3
        ]);

        return $this->render('authority/register_author.html.twig');
    }

    public function edit(Request $request, Authority $authority) {

        $form = $this->createForm(AuthorityType::class, $authority);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($authority);
            $em->flush();

            return $this->render('authority/detail_author.html.twig', [
                    'authority' => $authority,
                    'opcion' => 3
            ]);
        }

        return $this->render('authority/register_author.html.twig', [
                'edit' => true,
                'form' => $form->createView(),
                'opcion' => 3
        ]);
    }

    public function delete_author(Authority $authority) {

        if (!$authority) {
            return $this->render('authority/edit_delete.html.twig', [
                        'opcion' => 3
            ]);
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($authority);
        $em->flush();

        return $this->render('authority/edit_delete.html.twig', [
                    'opcion' => 3
        ]);
    }

//    public function edit_delete() {
//        return $this->render('authority/edit_delete.html.twig', [
//                    'opcion' => 3
//        ]);
//    }

    public function detail_author(Authority $authority) {
        if (!$authority) {
            return $this->redirectToRoute('search_author');
        }

        return $this->render('authority/detail_author.html.twig', [
                    'authority' => $authority,
                    'opcion' => 3
        ]);
    }

    public function unassign_author(Request $request) {
        $id_catalogue = $request->get('id_catalogue');
        $id_authority = $request->get('id_authority');
        $connection = $this->getDoctrine()->getConnection();
        $sql = "DELETE FROM authority_catalogue WHERE authority_id = " . $id_authority . " AND catalogue_id = " . $id_catalogue ;
        $prepare = $connection->prepare($sql);
        $prepare->execute();
        $em = $this->getDoctrine()->getManager(); 
        $catalogue = $em->getRepository(Catalogue::class)->find($id_catalogue);
        if($catalogue->getPeriodicity()=="" || $catalogue->getPeriodicity() == null){
               return $this->render('catalogue/book_detail.html.twig', [
                    'edit' => true,
                    'catalogues' => $catalogue,
                    'opcion' => 3
             ]);
        } else {
            return $this->render('issue/index.html.twig', [
                'edit' => true,
                'catalogue' => $catalogue,
                'opcion' => 3
             ]);
        }
    }

}
