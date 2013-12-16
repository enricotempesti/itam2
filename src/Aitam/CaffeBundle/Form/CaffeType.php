<?php

namespace Aitam\CaffeBundle\Form;

use Aitam\CaffeBundle\Entity\Caffe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaffeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('autore')
            ->add('descrizione')
            ->add('titolo')
            ->add('file1', 'file', array(
            		'label' => 'Immagine',
            		'required' => false,
            		'attr' => array(
            				'accept' => 'image/*',
            				'multiple' => true
            		)
            ))
            ->add('inserisciurl1','url',array('required' => false,'label' => 'inserisci-url vimeo,youtube'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Aitam\CaffeBundle\Entity\Caffe'
        ));
    }

    public function getName()
    {
        return 'aitam_caffebundle_caffetype';
    }
}
