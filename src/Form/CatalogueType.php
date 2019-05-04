<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CatalogueType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, array(
                      'label' => 'Titulo'
                     ))
                ->add('subtitle', TextType::class, array(
                      'label' => 'SubTitulo'
                     ))
                ->add('other_title', TextType::class, array(
                      'label' => 'Otros Titulos'
                     ))
                ->add('translate_title', TextType::class, array(
                      'label' => 'Titulo Traducido'
                     ))
                ->add('edition', TextType::class, array(
                      'label' => 'Edición'
                     ))
                ->add('publisher', TextType::class, array(
                      'label' => 'Editor'
                     ))
                ->add('submit', SubmitType::class, array(
                      'label' => 'Registrarse'
        ));
    }
}