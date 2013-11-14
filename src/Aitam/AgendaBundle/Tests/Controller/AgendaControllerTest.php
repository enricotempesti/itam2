<?php
namespace Aitam\AgendaBundle\Tests\Controller;

use Symfony\Component\HttpFoundation\Request;
use Aitam\AgendaBundle\Controller\AgendaController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AgendaControllerTest extends WebTestCase
{
	
	private $repo;
	
	protected $request;
	
	public function setUp() {
		$kernel = static::createKernel();
		$kernel->boot();
		$this->repo = $kernel->getContainer();
		$this->request = new Request();
	}
   
	public  function testcalendario(){
		
$service = $this->repo->get('$this->request');
$service->setRequest($this->request);
		
		$myurl = $this->repo->get('$service')->getRequestUri();
		var_dump($myurl);
		$rr = new AgendaController();
		
		
		$this->assertEquals('Sensio','Sensio');
		$this->assertEquals('Hello', 'Hello');
	}
	
	
}
