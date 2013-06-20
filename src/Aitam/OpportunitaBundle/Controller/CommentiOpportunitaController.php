<?php

namespace Aitam\OpportunitaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\OpportunitaBundle\Entity\Commentiopportunita;
use Aitam\OpportunitaBundle\Form\CommentiopportunitaType;

/**
 * Commentiopportunita controller.
 */
class CommentiOpportunitaController extends Controller
{    
    public function newAction($opportunita_id)
    {
        $opportunita = $this->getOpportunita($opportunita_id);

        $commentiopportunita = new Commentiopportunita();
        $commentiopportunita->setArticolo($opportunita);
        $form   = $this->createForm(new CommentiOpportunitaType(), $commentiopportunita);

        return $this->render('AitamOpportunitaBundle:CommentiOpportunita:form.html.twig', array(
            'commentiopportunita' => $commentiopportunita,
            'form'   => $form->createView()
        ));
    }

    public function createAction($opportunita_id)
    {
        $opportunita = $this->getOpportunita($opportunita_id);

        $commentiopportunita  = new Commentiopportunita();
        $commentiopportunita->setArticolo($opportunita);
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentiopportunitaType(), $commentiopportunita);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($commentiopportunita);
            $em->flush();

            return $this->redirect($this->generateUrl('AitamOpportunitaBundle_Opportunita_show', array(
                'id' => $commentiopportunita->getarticolo()->getId(),
                'slug'  => $commentiopportunita->getArticolo()->getSlug())) .
                '#commenti-' . $commentiopportunita->getId()
            );

        }

        return $this->render('AitamOpportunitaBundle:CommentiOpportunita:create.html.twig', array(
            'commenti' => $commenti,
            'form'    => $form->createView()
        ));
    }

    protected function getOpportunita($opportunita_id)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $opportunita = $em->getRepository('AitamOpportunitaBundle:opportunita')->find($opportunita_id);

        if (!$opportunita) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $opportunita;
       
    }

}