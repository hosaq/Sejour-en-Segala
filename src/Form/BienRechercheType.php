<?php

namespace App\Form;

use App\Entity\BienRecherche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BienRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Prixmax', IntegerType::class, [
                'required'=>false,
                'label'=>false,
                'attr'=>['placeholder'=>'Prix max']
            ])
            ->add('Surfacemin', IntegerType::class, [
                'required'=>false,
                'label'=>false,
                'attr'=>['placeholder'=>'Surface minimale']
            ])
            ->add('Ville',TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>['placeholder'=>'Ville']
            ])
            ->add('address', null, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'id'=>'search_address'
                ]
            ])
            ->add('distance', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    '10 km' => 10,
                    '20 km' => 20,
                    '30 km'=>30,
                    '50 km'=>50,
                    '500 km'=>500
                ]
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BienRecherche::class,
            'method'=>'get',
            'csrf_protection'=>false,
        ]);
    }
    
    public function getBlockPrefix(){
        return '';
    }
}
