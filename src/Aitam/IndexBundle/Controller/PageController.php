<?php

namespace Aitam\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Aitam\IndexBundle\Entity\Enquiry;
use Aitam\IndexBundle\Form\EnquiryType;
use Aitam\DavisitareBundle\Entity\Commentidavisitare;
use Aitam\OpportunitaBundle\Entity\CommentiOpportunita;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
    		$em = $this->getDoctrine()
    		->getEntityManager();
    	
    		$dinuovo = $em->getRepository('AitamIndexBundle:Dinuovo')
    		->getBlogDinuovo($limit = 4);
                
                $davisitare = $em->getRepository('AitamDavisitareBundle:Davisitare')
    		->getBlogDavisitare($limit = 3);
                
                $Opportunita = $em->getRepository('AitamOpportunitaBundle:Opportunita')
    		->getBlogOpportunita($limit = 3);
    	
    		return $this->render('AitamIndexBundle:Page:index.html.twig', array(
    				'dinuovo' => $dinuovo,
                                'davisitare' => $davisitare,
                                'Opportunita' => $Opportunita
    		));
    	   
    }
    
    public function contactAction()
    {
    $enquiry = new Enquiry();
    $form = $this->createForm(new EnquiryType(), $enquiry);

    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
        $form->bindRequest($request);

            if ($form->isValid()) {

        $message = \Swift_Message::newInstance()
            ->setSubject('Contatto da Aitam')
            ->setFrom('form@Aitam.com')
            ->setTo($this->container->getParameter('aitam_index.emails.contact_email'))
            ->setBody($this->renderView('AitamIndexBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
        $this->get('mailer')->send($message);

        $this->get('session')->setFlash('contact-notice', 'La tua richiesta � stata spedita con successo!');
            // Perform some action, such as sending an email

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('AitamIndexBundle_contact'));
        }
    }

    return $this->render('AitamIndexBundle:Page:contact.html.twig', array(
        'form' => $form->createView()
    ));
    }
    
    public function aboutAction()
    {
    	return $this->render('AitamIndexBundle:Page:about.html.twig');
    }
    
    public function statutoAction()
    {
    	return $this->render('AitamIndexBundle:Page:statuto.html.twig');
    }
    
    public function testimonialAction()
    {
    	return $this->render('AitamIndexBundle:Page:progetti.html.twig');
    }
    
    public function forum_no_registratoAction()
    {
        return $this->render('AitamIndexBundle:Page:forum_no_registrato.html.twig');
    }

    public function sidebarAction()
    {
    	    $em = $this->getDoctrine()
               ->getEntityManager();
    
    	$commentLimit   = $this->container
    	->getParameter('aitam_dinuovo.commenti.latest_comment_limit');
        
    	$latestCommenti = $em->getRepository('AitamIndexBundle:Commenti')
    	->getLatestCommenti($commentLimit);
        
        $latestCommentidavisitare = $em->getRepository('AitamDavisitareBundle:Commentidavisitare')
    	->getLatestCommentiDavisitare($commentLimit);
        
        $latestCommentiopportunita = $em->getRepository('AitamOpportunitaBundle:Commentiopportunita')
    	->getLatestCommentiOpportunita($commentLimit);
    
    	return $this->render('AitamIndexBundle:Page:sidebar.html.twig', array(
    			'latestCommenti'    => $latestCommenti,
                        'latestCommentidavisitare'    => $latestCommentidavisitare,
                        'latestCommentiopportunita'    => $latestCommentiopportunita,
                        
    	));
    }
    
}