<?php

namespace Aitam\OpportunitaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class CommentiOpportunitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utente')
            ->add('commenti')
        ;
    }

    public function getName()
    {
        return 'aitam_Opportunitabundle_commentiOpportunitatype';
    }
}
