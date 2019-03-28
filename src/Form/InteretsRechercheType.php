<?php

namespace App\Form;

use App\Entity\InteretsRecherche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InteretsRechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            ->add('nom', TextType::class, [
                'required'=>false,
                'label'=>false,
                'attr'=>['placeholder'=>'Nom du centre dintérêt']
            ])
            /*->add('ville',TextType::class,[
                'required'=>false,
                'label'=>false,
                'attr'=>['placeholder'=>'Ville']
            ])*/
            ->add('address', null, [
                'label' => false,
                'required' => false,
                'attr'=>[
                    'id'=>'cherche_centre',
                    'placeholder'=>'Ville'
                ]
            ])
            ->add('distance', ChoiceType::class, [
                'placeholder' => 'Elargir',
                'label' => false,
                'required' => false,
                'choices' => [
                    '0 km'=>0,
                    '10 km' => 10,
                    '20 km' => 20,
                    '30 km'=>30,
                    '50 km'=>50,
                    '500 km'=>500
                ],
              
            ])
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => InteretsRecherche::class,
            'method'=>'get',
            'csrf_protection'=>false,
        ]);
    }
    
    public function getBlockPrefix(){
        return '';
    }
}
