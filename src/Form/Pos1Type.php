<?php

namespace App\Form;

use App\Entity\Pos1;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Pos1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('msisdn')
            ->add('dealer')
            ->add('nomdealer')
            ->add('cet')
            ->add('nompos')
            ->add('autrecontact')
            ->add('localisation')
            ->add('niveaustock')
            ->add('status')
            ->add('account')
            ->add('profile')
            ->add('localite')
            ->add('possegntl')
            ->add('possegreg')
            ->add('rgm30')
            ->add('smartphone')
            ->add('niveau')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pos1::class,
        ]);
    }
}
