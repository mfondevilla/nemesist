<?php

namespace App\Form;
use App\Entity\Authority;
use App\Entity\Catalogue;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CustomSearchType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', TextType::class, array('label'=>'Título'))
                 ->add('authority', EntityType::class, ['class'=>Authority::class, 'choice_label'=>'name'])
                ->add('publisher', TextType::class, array('label'=>'Editorial'))
                 ->add('year_publication', TextType::class, array('label'=>'Año'))
                 ->add('document_type', TextType::class, array('label'=>'Tipo Documento'))
                ->add('submit', SubmitType::class, array('label'=>'Buscar'));
    }
}
//
//public function buildForm(FormBuilderInterface $builder, array $options) {
//        $builder->add('title', TextType::class, array('label'=>'Título'))
//                 ->add('authority', EntityType::class, [
//                     class=>Authority::class],
//                     array('label'=>'Autor')
//                 )//nombre autor
//                 ->add('publisher', TextType::class, array('label'=>'Editorial'))
//                 ->add('year_publication', TextType::class, array('label'=>'Año'))
//                 ->add('document_type', TextType::class, array('label'=>'Tipo Documento'))
//                ->add('submit', SubmitType::class, array('label'=>'Buscar'));
//    }