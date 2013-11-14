<?php
namespace Application\Sonata\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Sonata\UserBundle\Form\Type\ProfileType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends BaseType
{
	
	private $class;
	
	/**
	 * @param string $class The User class name
	 */
	public function __construct($class)
	{
		$this->class = $class;
	}
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		parent::buildForm($builder, $options);
	
		
		$builder->add('image', 'file', array('required' => false, 'label' => 'Subir Foto'));
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
				'data_class' => $this->class
		));
	}
	
	public function getName()
	{
		return 'application_sonata_user_profile';
	}
	}


