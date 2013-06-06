<?php
 
namespace Aitam\AgendaBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AgendaController extends Controller{


    public function calendarioAction($monthID,$yearID)
    { 	
        $myurl = $this->get('request')->getRequestUri();

        $cal = $this->get("ModuloCalendario");
        $ved=$cal->MoCalendario();
        
        return $this->render('AitamAgendaBundle:Default:index.html.twig', 
        array(
            'cal' =>  $ved,
            'myurl' => $myurl,	   
        ));
  }
  
  public function EventoAction($id){
  	$em = $this->getDoctrine()->getEntityManager();
      
             $sqlID = $em->getRepository('AitamAgendaBundle:mynews')->find($id);
    if (!$sqlID) {
        throw $this->createNotFoundException('Unable to find evento post.');
    }  
        
  	return $this->render('AitamAgendaBundle:Default:evento.html.twig',
  			array(           
  					'sqlID' => $sqlID,
  			));	
  } 
  
  public function SidebarAction(){
      	$em = $this->getDoctrine()->getEntityManager();
      
             $sqlID = $em->getRepository('AitamAgendaBundle:mynews')->trovadata();
            
    if (!$sqlID) {
        throw $this->createNotFoundException('Unable to find evento post.');
    }  
    
  	return $this->render('AitamAgendaBundle:Default:sidebar.html.twig',
  			array(           
  					'sqlID' => $sqlID,
  			));	
  }
      
}
?>