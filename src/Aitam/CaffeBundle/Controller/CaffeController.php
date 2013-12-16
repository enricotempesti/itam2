<?php

namespace Aitam\CaffeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aitam\CaffeBundle\Entity\Caffe;
use Aitam\CaffeBundle\Form\CaffeType;

/**
 * Caffe controller.
 *
 * @Route("/caffe")
 */
class CaffeController extends Controller
{
    /**
     * Lists all Caffe entities.
     *
     * @Route("/", name="caffe")
     * @Template()
     */
    public function indexAction()
    {
    	
    	$entity = new Caffe();
    	$form   = $this->createForm(new CaffeType(), $entity);
    	
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AitamCaffeBundle:Caffe')->findAll();

        return array(
            'entities' => $entities,
        	'entity' => $entity,
        	'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Caffe entity.
     *
     * @Route("/{id}/show", name="caffe_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AitamCaffeBundle:Caffe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caffe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'caffe'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Caffe entity.
     *
     * @Route("/new", name="caffe_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Caffe();
        $form   = $this->createForm(new CaffeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Caffe entity.
     *
     * @Route("/create", name="caffe_create")
     * @Method("POST")
     * @Template("AitamCaffeBundle:Caffe:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Caffe();
        $form = $this->createForm(new CaffeType(), $entity);
        $form->bind($request);
        
        $url1 = $entity->getInserisciurl1();
        
        $cal = $this->get("ElaborazioneUrl");
        
        $nonconnessione = $cal->is_online();
        
        if ($nonconnessione == true) {
        }else{
        	return array(
        			'entity' => $entity,
        			'nonconnessione' => $nonconnessione,
        			'form' => $form->createView()
        	);
        }
        
        $cal->ElaUrl($url1, $url2 = null);
        $embedvideo1 = $cal->embedvideo1;
        $imgvideo1 = $cal->imgvideo1;
        $entity->setEmbedvideo1($embedvideo1);
        $entity->setImgvideo1($imgvideo1);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caffe', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Caffe entity.
     *
     * @Route("/{id}/edit", name="caffe_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AitamCaffeBundle:Caffe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caffe entity.');
        }

        $editForm = $this->createForm(new CaffeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Caffe entity.
     *
     * @Route("/{id}/update", name="caffe_update")
     * @Method("POST")
     * @Template("AitamCaffeBundle:Caffe:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AitamCaffeBundle:Caffe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caffe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CaffeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caffe_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Caffe entity.
     *
     * @Route("/{id}/delete", name="caffe_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AitamCaffeBundle:Caffe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caffe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caffe'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
