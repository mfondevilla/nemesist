<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ItemType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('status', ChoiceType::class, [
                      'label' => 'Estado',
                      'choices' => [
                          'Recuperar' => 'recuperar',
                          'Intervenir' => 'intervenir',
                          'Sustituir' => 'sustituir',
                          'Bueno' => 'bueno'
                     ]])
                ->add('purchase_date', DateType::class, array(
                      'label' => 'Adquisición',
                     'required'   => false,
                     ))
                ->add('purchase_value', TextType::class, array(
                      'label' => 'Precio adquisición',
                    'required'   => false,
                     ))
                ->add('notes', TextType::class, array(
                      'label' => 'Notas',
                    'required'   => false,
                     ))
                ->add('origin', TextType::class, array(
                      'label' => 'Origen/Procedencia',
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