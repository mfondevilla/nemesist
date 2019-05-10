<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegisterType;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class UserController extends AbstractController
{
    public function index()
    {
        return $this->render('includes/main.html.twig');
    }
   
     public function profile(UserInterface $user)
    {
        return $this->render('user/profile.html.twig', [
            'user' => $user
        ]);
    }
    
    
    public function login(AuthenticationUtils $authentication)
    {
        $error = $authentication->getLastAuthenticationError();
        $lastUsername = $authentication->getLastUsername();
  
        
        return $this->render('user/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    
    public function register_user(Request $request, UserPasswordEncoderInterface $encoder){
        
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
        
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
          'form'=>$form->createView()
        ]);
    }
    
    public function edit_profile(Request $request, UserInterface $user) {
       
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            //$task->setCreateAt(new \DateTime('now'));
            //$task->setUser($user);
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            return $this->render('home/index.html.twig', [
                'user' => $user
            ]);
        }
        
        return $this->render('user/register.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
    
      public function delete_profile(UserInterface $user) {

       
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        
        return $this->render('home/index.html.twig');
    }
}
