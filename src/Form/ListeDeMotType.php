<?php

namespace App\Form;

use App\Entity\ListeDeMots;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Mot;

class ListeDeMotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('theme',EntityType::class,array('class' => 'App\Entity\Theme','choice_label' => 'libelle'))
            ->add('mots',EntityType::class,['class' => Mot::class,'choice_label' => 'libelle', 'label' => 'Quel sera le mot?', 'expanded' => true, 'multiple' => true,])        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ListeDeMots::class,
        ]);
    }
}
