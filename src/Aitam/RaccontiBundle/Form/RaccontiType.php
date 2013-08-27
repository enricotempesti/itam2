<?php

namespace Aitam\RaccontiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Aitam\RaccontiBundle\Entity\Racconti;

class RaccontiType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('titolo')
                ->add('autore')
                ->add('descrizionebreve')
                ->add('descrizione')
                ->add('tipo', 'choice', array('choices' => Racconti::getTypes()))
                ->add('file1', 'file', array(
                    'label' => 'Imamagine 1 ',
                    'required' => false,
                    'attr' => array(
                        'accept' => 'image/*',
                        'multiple' => true
                    )
                ))
                
                ->add('file2', 'file', array(
                    'label' => 'Immagine 2 ',
                    'required' => false,
                    'attr' => array(
                        'accept' => 'image/*',
                    )
                ))
                ->add('file3', 'file', array(
                    'label' => 'Immagine 3 ',
                    'required' => false,
                    'attr' => array(
                        'accept' => 'image/*',
                    )
                ))
                ->add('file4', 'file', array(
                    'label' => 'Immagine 4 ',
                    'required' => false,
                    'attr' => array(
                        'accept' => 'image/*',
                    )
                ))
               ->add('file5', 'file', array(
                    'label' => 'Immagine 5 ',
                    'required' => false,
                    'attr' => array(
                        'accept' => 'image/*',
                    )
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Aitam\RaccontiBundle\Entity\Racconti'
        ));
    }

    public function getName() {
        return 'aitam_raccontibundle_raccontitype';
    }

}
