<?php

namespace Aitam\DavisitareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\DavisitareBundle\Entity\Commentidavisitare;
use Aitam\DavisitareBundle\Form\CommentidavisitareType;

/**
 * Commentidavisitare controller.
 */
class CommentidavisitareController extends Controller
{
    public function newAction($davisitare_id)
    {
        $davisitare = $this->getdavisitare($davisitare_id);

        $commentidavisitare = new Commentidavisitare();
        $commentidavisitare->setArticolo($davisitare);
        $form   = $this->createForm(new commentidavisitareType(), $commentidavisitare);

        return $this->render('AitamDavisitareBundle:Commentidavisitare:form.html.twig', array(
            'commentidavisitare' => $commentidavisitare,
            'form'   => $form->createView()
        ));
    }

    public function createAction($davisitare_id)
    {
        $davisitare = $this->getDavisitare($davisitare_id);

        $commentidavisitare  = new Commentidavisitare();
        $commentidavisitare->setArticolo($davisitare);
        $request = $this->getRequest();
        $form    = $this->createForm(new CommentidavisitareType(), $commentidavisitare);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($commentidavisitare);
            $em->flush();

            return $this->redirect($this->generateUrl('AitamDavisitareBundle_davisitare_show', array(
                'id' => $commenti->getarticolo()->getId(),
                'slug'  => $commenti->getArticolo()->getSlug())) .
                '#commenti-' . $commenti->getId()
            );

        }

        return $this->render('AitamIndexBundle:Commentidavisitare:create.html.twig', array(
            'commenti' => $commenti,
            'form'    => $form->createView()
        ));
    }

    protected function getDavisitare($davisitare_id)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $davisitare = $em->getRepository('AitamDavisitareBundle:davisitare')->find($davisitare_id);

        if (!$davisitare) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $davisitare;
    }

}