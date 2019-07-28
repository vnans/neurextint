<?php

namespace App\Form;

use App\Entity\Biographie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BiographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomprenoms')
            ->add('fonction')
            ->add('annneedexperience')
            ->add('grade')
            ->add('operations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Biographie::class,
        ]);
    }
}
