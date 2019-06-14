<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IssueType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, array(
                      'label' => 'Título',
                        'required'   => false,
                     ))
                ->add('volume', TextType::class, array(
                      'label' => 'Volumen',
                        'required'   => false,
                     ))
                ->add('number', TextType::class, array(
                      'label' => 'Número',
                      'required'   => false,
                     ))
                ->add('year', TextType::class, array(
                      'label' => 'Año',
                    'required'   => false,
                     ))
                ->add('month', TextType::class, array(
                      'label' => 'Mes',
                    'required'   => false,
                     ))
                ->add('day', TextType::class, array(
                      'label' => 'Día',
                    'required'   => false,
                     ))      
                ->add('cover', FileType::class, array(
                      'label' => 'Ruta imagen',
                      "attr" =>array("class" => "form-control"),
                     "data_class" => null, 
                    'required'   => false,
                     ))
                  ->add('submit', SubmitType::class, array(
                      'label' => 'Guardar'
                      ));
    }
}