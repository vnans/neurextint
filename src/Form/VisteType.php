<?php

namespace App\Form;

use App\Entity\Viste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('moderechargement')
            ->add('rattachement')
            ->add('verificationid')
            ->add('point')
            ->add('bundle')
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Viste::class,
        ]);
    }
}
