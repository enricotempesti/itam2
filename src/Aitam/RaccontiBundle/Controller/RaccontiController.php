<?php

namespace Aitam\RaccontiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Aitam\RaccontiBundle\Entity\Racconti;
use Aitam\RaccontiBundle\Form\RaccontiType;

/**
 * Racconti controller.
 *
 * @Route("/racconti")
 */
class RaccontiController extends Controller
{
    /**
     * Lists all Racconti entities.
     *
     * @Route("/", name="racconti")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AitamRaccontiBundle:Racconti')->getphotoracconti();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Racconti entity.
     *
     * @Route("/{id}/show", name="racconti_show")
     * @Template()
     */
    public function showAction($id)
    {

        $racconti = $this->getDoctrine()->getRepository('AitamRaccontiBundle:Racconti')->find($id);

        if (!$racconti) {
            throw $this->createNotFoundException('Unable to find Racconti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'racconti'      => $racconti,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Racconti entity.
     *
     * @Route("/new", name="racconti_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Racconti();
        
        $form   = $this->createForm(new RaccontiType(), $entity);
        

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Racconti entity.
     *
     * @Route("/create", name="racconti_create")
     * @Method("POST")
     * @Template("AitamRaccontiBundle:Racconti:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Racconti();
        
        $form = $this->createForm(new RaccontiType(), $entity);

        $form->bind($request);
        
        //var_dump($entity);
       // die;
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('racconti_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Racconti entity.
     *
     * @Route("/{id}/edit", name="racconti_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AitamRaccontiBundle:Racconti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Racconti entity.');
        }

        $editForm = $this->createForm(new RaccontiType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Racconti entity.
     *
     * @Route("/{id}/update", name="racconti_update")
     * @Method("POST")
     * @Template("AitamRaccontiBundle:Racconti:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AitamRaccontiBundle:Racconti')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Racconti entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RaccontiType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('racconti_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Racconti entity.
     *
     * @Route("/{id}/delete", name="racconti_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AitamRaccontiBundle:Racconti')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Racconti entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('racconti'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
