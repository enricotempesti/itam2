<?php

namespace Aitam\OpportunitaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Opportunita controller.
 */
class OpportunitaController extends Controller
{
    /**
     * Show a Opportunita entry
     */
    public function OpportunitaAction($id,$slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $opportunita = $em->getRepository('AitamOpportunitaBundle:Opportunita')->find($id);

      if (!$opportunita) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }
       
         $commenti = $em->getRepository('AitamOpportunitaBundle:Commentiopportunita')
                   ->getCommentiOpportunitaForarticolo($opportunita->getId());

        return $this->render('AitamOpportunitaBundle:Opportunita:Opportunita_show.html.twig', array(
            'opportunita' => $opportunita,
            'commenti'  => $commenti
        ));
    }
    
    public function home_OpportunitaAction()
    {
    	$em = $this->getDoctrine()
    	->getEntityManager();
    
    	$Opportunita = $em->getRepository('AitamOpportunitaBundle:Opportunita')
    	->getLatestOpportunita();
    
    	return $this->render('AitamOpportunitaBundle:Opportunita:home_Opportunita.html.twig', array(
    			'Opportunita' => $Opportunita
    	));
    }
    
}
