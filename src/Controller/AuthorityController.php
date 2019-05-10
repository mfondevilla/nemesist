<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AuthorityRepository;
use App\Form\AuthorityType;
use App\Entity\Authority;
use App\Entity\Catalogue;



class AuthorityController extends AbstractController
{
    /**
     * @Route("/authority", name="authority")
     */
    public function index()
    {
        return $this->render('authority/index.html.twig', [
            'controller_name' => 'AuthorityController',
        ]);
    }
    
    public function buscar_ini()
    {
        return $this->render('authority/buscar_autor.html.twig', [
            'controller_name' => 'AuthorityController',
            'autores' => null,
            'message' => "",
        ]);
    }
    
    public function buscar(Catalogue $catalogo, Request $request, AuthorityRepository $authrepository)
    {
        if ($request->isMethod('post'))
        {
            //Cargamos el repositorio
            $name = $request->get('search');
            //REPOSITORIO
            $autores = $authrepository->findByName($name);
            $message = "";
            $autores_filtro = [];
            $_SESSION['catalogue'] = $catalogo;
            if (!$autores)
            {
                $message = "No se ha encontrado ningun resultado con: " . $name;
            } else {//$autores && isset($_SESSION['authors'])
            
                foreach ($autores as $autor) 
                {
                    $encontrado = false;
                    foreach ($catalogo->getAuthority() as $author)
                    {
                        if ($autor->getId() == $author->getId()) 
                        {
                            $encontrado = true;
                        }
                    }
                    if (!$encontrado)
                    {
                        $autores_filtro[] = $autor;
                    }
                }
            } 
            if (isset($autores_filtro))
            {
                $autores = $autores_filtro;
            }
            
            return $this->render('authority/buscar_autor.html.twig', [
                'autores' => $autores,
                'message' => $message,
                'catalogo' => $catalogo,
            ]);
        }
        
        
        return $this->render('authority/buscar_autor.html.twig', [
            'controller_name' => 'AuthorityController',
            'autores' => null,
            'message' => "",
        ]);
    }
    //en el caso de las relaciones si pasamos el objeto por parámetro al hacer persist lo guardará como un nuevo
//    registro en la base de datos. Debemos recuperar el objeto del propio repositorio ya que al proceder de doctrine
//           detecta que viene de un registro de la base de datos y entonces no persistira/duplicará el objeto
//            guardando únicamente la relación (en el caso de querer registrar una relación entre objetos existentes en la bdd)
    //en el caso de que existiera una de las entidades no hace falta recuperar los objetos del repositorio. Se hace un add
   // del objeto que existe (al que no existe) y al persistir se persiste el que no existe y la relación correspondiente
        public function select_buscar_autor(Authority $author)
    {
        if (!$author)
        {
            return $this->redirectToRoute('buscar_autor');
        }
        if (isset($_SESSION['catalogue']))
        {
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
            
            return $this->render('authority/buscar_autor.html.twig', [
            'autores' => null,
            'message' => "",
            'catalogo' => $catalogue,
        ]);
        } 

        return $this->render('authority/buscar_autor.html.twig', [
            'autores' => null,
            'message' => "",
            'catalogo' => $catalogo,
        ]);
    }
    
    public function asign_authors(Catalogue $catalogo)
    {
        return $this->render('authority/buscar_autor.html.twig', [
            'controller_name' => 'AuthorityController',
            'autores' => null,
            'message' => "",
            'catalogo' => $catalogo,
        ]);
    }
    public function search_author(Request $request, AuthorityRepository $authorityRepository){
       $message = '';
        if($request->isMethod('post')){
           $name = $request->get('search');
           $authorities = $authorityRepository->findByName($name);
           
           
            if(!$authorities){
                $message = "Ningún autor coincide con los criterios de búsqueda";
            } else{
                $message = "el autor existe";
            }
        }
        return $this->render('authority/edit_delete.html.twig',[
            'authorities' =>$authorities,
            'message' => $message
        ]);
    }
    
    
     public function new_author(Request $request){
        
        $authority = new Authority();
        $form = $this->createForm(AuthorityType::class, $authority);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
          
            $em = $this->getDoctrine()->getManager();
            $em->persist($authority);
            $em->flush();
            
            return $this->redirect($this->generateUrl('new_author'));
        }
        
        return $this->render('authority/new_author.html.twig',[
            'form' => $form->createView()
        ]);
  
        return $this->render('authority/new_author.html.twig');
        
    }
    
        
    public function edit(Request $request, Authority $authority) {
       
        $form = $this->createForm(AuthorityType::class, $authority);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreateAt(new \DateTime('now'));
            //$task->setUser($user);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($authority);
            $em->flush();
            
             return $this->redirect($this->generateUrl('authority_detail', [
                'id' => $authority->getId()
            ]));
        }
        
        return $this->render('authority/new_author.html.twig', [
            'edit' => true,
            'form' => $form->createView()
        ]);
    }
    
    public function delete(Authority $authority) {

        if(!$authority) {
            return $this->redirectToRoute('manage_authority');
        }
        
        $em = $this->getDoctrine()->getManager();
        $em->remove($authority);
        $em->flush();
        
        return $this->redirectToRoute('manage_authority');
    }
    
    public function edit_delete(){
        return $this->render('authority/edit_delete.html.twig');
    }
    
    public function detail(Authority $authority){
        if(!$authority) {
            return $this->redirectToRoute('authority');
        }
        
        return $this->render('authority/detail.html.twig', [
            'authority' => $authority
        ]);
    }

   
}
