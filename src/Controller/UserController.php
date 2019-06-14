<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Service\DataService;
use App\Form\UserType;
use App\Entity\User;


class UserController extends AbstractController
{
    public function inicio()
    {
        unset($_SESSION['search_generic']);
        return $this->render('views/main.html.twig', [
            'opcion' => 1
        ]);
    }
    
    public function logueo(UserInterface $user)
    {
        $token =  $user->getToken();
        if($token == "1"){
               return $this->redirectToRoute('logout');
            
        } else {
            return $this->render('views/main.html.twig', [
            'opcion' => 1,
            'user'=>$user
        ]);
        }     
       
        
    }
   
    public function profile(UserInterface $user)
    {
        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'opcion' => 0
        ]);
    }
    
    public function map ()
    {
        return $this->render('views/map.html.twig', [
            'opcion' => 2
        ]);
    }
    
    public function mantenimiento ()
    {
        return $this->render('views/mantenimiento.html.twig', [
            'opcion' => 3
        ]);
    }
    
    public function login(AuthenticationUtils $authentication)
    {
       
        $error = $authentication->getLastAuthenticationError();
        $lastUsername = $authentication->getLastUsername();
        
        return $this->render('user/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'opcion'=> 0
        ]);
    }
    
    public function register_user(Request $request, UserPasswordEncoderInterface $encoder){
        
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $user->setRole('ROLE_USER');
            $user->setGender('male');
            $user->setAge(22);
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            
            //guardar
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->redirectToRoute('login');
            
        }
        
        return $this->render('user/register.html.twig', [
            'form'=>$form->createView(),
            'opcion'=>0
        ]);
    }
    
    public function edit_profile(Request $request, UserInterface $user) {
       
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreateAt(new \DateTime('now'));
            //$task->setUser($user);
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->render('home/index.html.twig', [
                'user' => $user,
                'opcion'=>0
            ]);
        }
        
        return $this->render('user/register.html.twig', [
            'user' => $user,
            'edit' => 1,
            'form' => $form->createView(),
            'opcion'=>0
        ]);
    }
    
//    public function delete_profile(UserInterface $user) {
//        $em = $this->getDoctrine()->getManager();
//        $em->remove($user);
//        $em->flush();
//        
//        return $this->render('home/index.html.twig');
//    }
    
    public function search_generic(Request $request, DataService $dataService) 
    {
       $paginacion= null;
        $catalogues = null;
        $message = "";
        if ($request->isMethod('post'))
        {
            if(isset($_SESSION)){
                $_SESSION['search_generic'] = $request->get('search');
            } else {
                session_start();
                $_SESSION['search_generic'] = $request->get('search');
            }
            $paginacion = $dataService->ReturnDataGeneric($request);
            $catalogues = $paginacion->getItems();
        }else{
            if (isset($_SESSION['search_generic'])) 
            {
                $request->attributes->set('search',$_SESSION['search_generic']);
                $paginacion = $dataService->ReturnDataGeneric($request);
                $catalogues = $paginacion->getItems();
            }
        }
        
        return $this->render('views/search_generic.html.twig', [
                'paginacion' => $paginacion,
                'catalogues' => $catalogues,
                'message' => $message,
                'opcion' => 0
            ]);
    }
    
    public function unsubscribe(UserInterface $user){
        $user->setToken(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        //logout
        return $this->redirectToRoute('logout');
    }
}
