<?php

namespace Aitam\DavisitareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Davisitare controller.
 */
class DavisitareController extends Controller
{
    /**
     * Show a davisitare entry
     */
    public function DavisitareAction($id,$slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $davisitare = $em->getRepository('AitamDavisitareBundle:Davisitare')->find($id);

      if (!$davisitare) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }
       
         $commenti = $em->getRepository('AitamDavisitareBundle:Commentidavisitare')
                   ->getCommentidavisitareForarticolo($davisitare->getId());

        return $this->render('AitamDavisitareBundle:Davisitare:davisitare_show.html.twig', array(
            'davisitare' => $davisitare,
            'commenti'  => $commenti
        ));
    }
    
    public function home_davisitareAction()
    {
    	$em = $this->getDoctrine()
    	->getEntityManager();
    
    	$davisitare = $em->getRepository('AitamDavisitareBundle:Davisitare')
    	->getLatestDavisitare();
    
    	return $this->render('AitamDavisitareBundle:Davisitare:home_davisitare.html.twig', array(
    			'davisitare' => $davisitare
    	));
    }
    
}
