<?php

namespace Aitam\DavisitareBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\IndexBundle\Helpers\Paginator;

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
    
    public function home_davisitareAction($page)
    {
    	$blog_per_page = $this->container->getParameter('blog_per_seconda_pagina');
    	$page_range = $this->container->getParameter('range_pagine');
    	
    	$itemsCount = $this->getDoctrine()->getRepository("AitamDavisitareBundle:Davisitare")->getCount();
    	if (!$itemsCount) {
    		throw $this->createNotFoundException('Nessun blog � stato trovato per blog' );
    	}
    	
    	$paginator = new Paginator($itemsCount, $page, $blog_per_page, $page_range);
    	
    	$offset = ($page - 1) * $blog_per_page;
    	$limit = $blog_per_page;
    	
    	$em = $this->getDoctrine()
    	->getEntityManager();
    
    	$davisitare = $em->getRepository('AitamDavisitareBundle:Davisitare')
    	->getPagination($offset, $limit);
    
    	return $this->render('AitamDavisitareBundle:Davisitare:home_davisitare.html.twig', array(
    			'davisitare' => $davisitare,
    			'paginator' => $paginator,
    	));
    }
    
}
