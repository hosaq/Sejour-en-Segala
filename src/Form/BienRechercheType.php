<?php

namespace App\Form;

use App\Entity\BienRecherche;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
