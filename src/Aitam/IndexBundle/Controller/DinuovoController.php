<?php

namespace Aitam\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\IndexBundle\Helpers\Paginator;

/**
 * Dinuovo controller.
 */
class DinuovoController extends Controller {

    /**
     * Show a dinuovo entry
     */
    public function DinuovoAction($id, $slug) {
        $em = $this->getDoctrine()->getEntityManager();

        $dinuovo = $em->getRepository('AitamIndexBundle:Dinuovo')->find($id);

        if (!$dinuovo) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $commenti = $em->getRepository('AitamIndexBundle:Commenti')
                ->getCommentiForarticolo($dinuovo->getId());

        return $this->render('AitamIndexBundle:Dinuovo:dinuovo_show.html.twig', array(
                    'dinuovo' => $dinuovo,
                    'commenti' => $commenti
                ));
    }

    public function home_dinuovoAction($page) {
        
        $blog_per_page = $this->container->getParameter('blog_per_seconda_pagina');
        $page_range = $this->container->getParameter('range_pagine');
        
        $itemsCount = $this->getDoctrine()->getRepository("AitamIndexBundle:Dinuovo")->getCount();
        if (!$itemsCount) {
            throw $this->createNotFoundException('Nessun blog � stato trovato per blog' );
        }
        
        $paginator = new Paginator($itemsCount, $page, $blog_per_page, $page_range);

        $offset = ($page - 1) * $blog_per_page;
        $limit = $blog_per_page;
        $em = $this->getDoctrine()
                ->getEntityManager();

        $dinuovo = $em->getRepository("AitamIndexBundle:Dinuovo")
                ->getPagination($offset, $limit);
        
        
        return $this->render('AitamIndexBundle:Dinuovo:home_dinuovo.html.twig', array(
                    'dinuovo' => $dinuovo,
                    'paginator' => $paginator,
                             
                ));
    }

}
