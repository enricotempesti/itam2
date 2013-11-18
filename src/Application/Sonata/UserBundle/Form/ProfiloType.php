<?php
namespace Application\Sonata\UserBundle\Form;

use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ProfiloType extends AbstractType
{
	
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
		
            ->add('dateOfBirth', 'date', array( 'label' => 'Data del compleanno','required' => false))
            ->add('website', 'url', array('label' => 'Le tue pagine','required' => false))
		    ->add('biography', 'file', array( 
		    		//'data_class' => 'Symfony\Component\HttpFoundation\File\File',
                    //'property_path' => 'biography',
		    		'required' => false, 'label' => 'Cambia la foto',
		    		'data_class' => null,
		    		    'attr' => array(
                        'accept' => 'image/*',
                        'multiple' => true,
		    		))); 
		
	}
		
		public function setDefaultOptions(OptionsResolverInterface $resolver) {
			$resolver->setDefaults(array(
					'data_class' => 'Sonata\UserBundle\Entity\BaseUser'
			));
		}
		
		public function getName() {
			return 'Sonatauserbundle_profilotype';
		}
}
