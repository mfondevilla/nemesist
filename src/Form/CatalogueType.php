<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CatalogueType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options){
       $builder-> add('title', TextType::class, ['label'=>'Título'])
                    ->add('subtitle', TextType::class)
                    ->add('submit', SubmitType::class, [
                        'label'=>'Guardar',
                        'attr'=>['class'=>'btn btn_success']
                        ]);
        
    }
    
}