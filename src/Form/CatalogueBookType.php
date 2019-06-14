<?php
namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CatalogueBookType extends AbstractType {
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, array(
                      'label' => 'Titulo'
                     ))
                ->add('subtitle', TextType::class, array(
                      'label' => 'SubTitulo',
                      'required' => false
                     ))
                ->add('translate_title', TextType::class, array(
                      'label' => 'Titulo Traducido',
                      'required' => false
                     ))
                ->add('edition', TextType::class, array(
                      'label' => 'Edición',
                      'required' => false
                     ))
                ->add('year_publication', TextType::class, array(
                      'label' => 'Año de Publicación',
                      'required' => false
                     ))
                ->add('place_publication', TextType::class, array(
                      'label' => 'Lugar de Publicación',
                      'required' => false
                     ))
                ->add('document_type', ChoiceType::class, array(
                      'label' => 'Tipo de Documento',
                      'required' => false,
                      'choices' => array (
                          'Acta de Congreso' => 'conference report',
                          'Audio Visual' => 'visual audio',
                          'Catalogo' => 'catalogue',
                          'Folleto' => 'brochure',
                          'Informe' => 'report',
                          'Legislación' => 'legislation',
                          'Manuscrito' => 'manuscript',
                          'Mapa' => 'map',
                          'Monografía' => 'monograph',
                          'Obra de Referencia' => 'reference work',
                          'Publicación Periodica' => 'periodical publication',
                          'Separata' => 'separate'
                     )))
                ->add('subdoc_type', TextType::class, array(
                      'label' => 'Tipo de Subdocumento',
                      'required' => false
                     ))
                ->add('physical_description', TextType::class, array(
                      'label' => 'Descripción Física',
                      'required' => false
                     ))
                ->add('language', ChoiceType::class, array(
                      'label' => 'Idioma',
                      'required' => false,
                      'choices' => array (
                          'Español' => 'spanish',
                          'Ingles' => 'english',
                          'Francés' => 'french',
                          'Potugués' => 'portuguese',
                          'Italiano' => 'italian',
                          'Alemán' => 'german'
                     )))
                ->add('notes', TextType::class, array(
                      'label' => 'Notas',
                      'required' => false
                     ))
                ->add('numb_copies', TextType::class, array(
                      'label' => 'Número de Copias',
                      'required' => false
                     ))
                ->add('ISBN', TextType::class, array(
                      'label' => 'ISBN',
                      'required' => false
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