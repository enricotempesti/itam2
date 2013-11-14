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

		    ->add('firstname', null, array('required' => false))
            ->add('lastname', null, array('required' => false))
            ->add('dateOfBirth', 'birthday', array('required' => false))
            ->add('website', 'url', array('required' => false))
		    ->add('biography', 'file', array('required' => false, 'label' => 'Invia Foto'));
		
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
