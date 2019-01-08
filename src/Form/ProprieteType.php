<?php

namespace App\Form;

use App\Entity\Immo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProprieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('type')
            ->add('description')
            ->add('prix')
            ->add('surface')
            ->add('surface_terrain')
            ->add('pays')
            ->add('ville')
            ->add('code_postal')
            ->add('vendu')
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
