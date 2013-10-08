<?php

namespace Aitam\OpportunitaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\IndexBundle\Helpers\Paginator;

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
    
    public function home_OpportunitaAction($page)
    {
    	$blog_per_page = $this->container->getParameter('blog_per_seconda_pagina');
    	$page_range = $this->container->getParameter('range_pagine');
    	 
    	$itemsCount = $this->getDoctrine()->getRepository("AitamOpportunitaBundle:Opportunita")->getCount();
    	if (!$itemsCount) {
    		throw $this->createNotFoundException('Nessun blog � stato trovato per blog' );
    	}
    	 
    	$paginator = new Paginator($itemsCount, $page, $blog_per_page, $page_range);
    	 
    	$offset = ($page - 1) * $blog_per_page;
    	$limit = $blog_per_page;
    	
    	$em = $this->getDoctrine()
    	->getEntityManager();
    	
    	$Opportunita = $em->getRepository('AitamOpportunitaBundle:Opportunita')
    	->getPagination($offset, $limit);
    
    	return $this->render('AitamOpportunitaBundle:Opportunita:home_Opportunita.html.twig', array(
    			'Opportunita' => $Opportunita,
    			'paginator' => $paginator,
    	));
    }
    
}
