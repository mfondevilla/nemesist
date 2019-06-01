<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', TextType::class, array('label'=>'Nombre'))
                ->add('surname1', TextType::class, array('label'=>'Apellido'))
                ->add('surname2', TextType::class, array('label'=>'Segundo Apellido'))
                ->add('email', EmailType::class, array('label'=>'Email'))
                ->add('password', PasswordType::class, array('label'=>'Contraseña'))
                                ->add('gender', ChoiceType::class, array(
                          'label' => 'Genero',
                          'choices' => array(
                          'Masculino' => 'male',
                          'Femenino' => 'female'
                     )))
                ->add('age', TextType::class, array(
                      'label' => 'Edad'
                     ))
                ->add('submit', SubmitType::class, array('label'=>'Guardar'));
    }
}