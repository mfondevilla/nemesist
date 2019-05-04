<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CatalogueMagazineType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, array(
                      'label' => 'Titulo'
                     ))
                ->add('subtitle', TextType::class, array(
                      'label' => 'SubTitulo'
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
                ->add('year_publication', TextType::class, array(
                      'label' => 'Año de Publicación'
                     ))
                ->add('place_publication', TextType::class, array(
                      'label' => 'Lugar de Publicación'
                     ))
                ->add('document_type', TextType::class, array(
                      'label' => 'Tipo de Documento'
                     ))
                ->add('subdoc_type', TextType::class, array(
                      'label' => 'Tipo de Subdocumento'
                     ))
                ->add('physical_description', TextType::class, array(
                      'label' => 'Descripción Física'
                     ))
                ->add('periodicity', TextType::class, array(
                      'label' => 'Periodicidad'
                     ))
                ->add('vol', TextType::class, array(
                      'label' => 'Volumen'
                     ))
                ->add('serie', TextType::class, array(
                      'label' => 'Serie'
                     ))
                ->add('nserie', TextType::class, array(
                      'label' => 'Número de Serie'
                     ))
                ->add('language', ChoiceType::class, array(
                      'label' => 'Idioma',
                      'choices' => array (
                          'Español' => 'spanish',
                          'Ingles' => 'english',
                          'Francés' => 'french',
                          'Potugués' => 'portuguese',
                          'Italiano' => 'italian',
                          'Alemán' => 'german'
                     )))
                ->add('notes', TextType::class, array(
                      'label' => 'Notas'
                     ))
                ->add('summary', TextType::class, array(
                      'label' => 'Resumen'
                     ))
                ->add('numb_copies', TextType::class, array(
                      'label' => 'Número de Copias'
                     ))
                ->add('ISSN', TextType::class, array(
                      'label' => 'ISSN'
                     ))
                ->add('cover', TextType::class, array(
                      'label' => 'Portada'
                     ))
                ->add('submit', SubmitType::class, array(
                      'label' => 'Registrarse'
        ));
    }
}