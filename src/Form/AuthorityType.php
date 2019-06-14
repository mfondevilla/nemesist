<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AuthorityType extends AbstractType {
    
    public function buildform(FormBuilderInterface $builder, array $options) {
        $builder->add('name', TextType::class, array(
            'label' => 'Nombre'
        ))
           ->add('typeauth', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => array(
                'Entidades' => 'Entidades',
                'Personales' => 'Personales',
                'Editoriales' => 'Editoriales',
                'Congresos' => 'Congresos'
            )
        ))
          
            ->add('submit', SubmitType::class, array(
            'label' => 'Guardar autor'
        ));
    }
}
