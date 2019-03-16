<?php

namespace App\Form;

use App\Entity\Immo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('type')
            ->add('description')
             ->add('description_region')   
             ->add('description_precise') 
            ->add('prix')
            ->add('surface')
            ->add('surface_terrain')
            ->add('adresse')   
            ->add('pays')
            ->add('region')
            ->add('ville')
            ->add('code_postal')
            ->add('lat')
            ->add('lng')    
            ->add('vendu', ChoiceType::class, array(
                      'choices' => array('En vente' => 'En vente', 'Vendu' =>'Vendu', 
                      'Sous compromis' =>'Sous compromis'),'label'=>'Statut',
                      ))
            ->add('fondFile', FileType::class, [
                'required' => false
            ])
            ->add('logosFile', FileType::class, [
                'required' => false
            ]) 
             ->add('largesFile', FileType::class, [
                'required' => false
            ])    
             ->add('rappelfondsFile', FileType::class, [
                'required' => false
            ])    
             ->add('regionsFile', FileType::class, [
                'required' => false
            ])    
              ->add('chambresFile', FileType::class, [
                'required' => false
            ])    
              ->add('communsFile', FileType::class, [
                'required' => false
            ])    
              ->add('propriosFile', FileType::class, [
                'required' => false
            ])    
                  
            ->add('photoFiles', FileType::class, [
                'required'=> false,
                'multiple'=>true
            ])
                
            #->add('date',DateType::class,array(
             #   'widget'=>'single_text',
              #  'format'=>'dd-MM-yyyy',
            #))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Immo::class,
        ]);
    }
}
