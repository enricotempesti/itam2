<?php

namespace Aitam\RaccontiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;


class RaccontiAdmin extends Admin
{
	/**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
		    
            ->add('titolo')
            ->add('autore')
            ->add('descrizione')
            ->add('descrizionebreve')
            ->add('isactive')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            
            ->add('titolo')
            ->add('autore')
            ->add('descrizione')
            ->add('descrizionebreve')
            ->add('isactive')
     
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
		    
            ->addIdentifier('titolo')
            ->add('autore')
            ->add('descrizione')
            ->add('descrizionebreve')
            ->add('isactive')
    
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titolo')
            ->add('autore')
            ->add('descrizione')
            ->add('descrizionebreve')
            ->add('created')
            ->add('updated')
            ->add('isactive')
        ;
    }
    
}
?>
