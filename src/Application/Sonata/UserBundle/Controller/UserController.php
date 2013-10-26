<?php
namespace Application\Sonata\UserBundle\Controller;
use Application\Sonata\UserBundle\Entity;
use Aitam\IndexBundle\Helpers\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

	public function listaiscrittiAction($page) {
		/*		$listauser = $em->getRepository('ApplicationSonataUserBundle:user')->findBy (array ('enabled' => true)
		 ,array('id' => 'DESC'), $limit = null,$offset = null);
		 */
		$em = $this->getDoctrine()->getEntityManager();

		$blog_per_page = $this->container
				->getParameter('iscritti_per_seconda_pagina');
		$page_range = $this->container->getParameter('range_pagine');

		$itemsCount = $this->getCount();

		if (!$itemsCount) {
			throw $this
					->createNotFoundException(
							'Nessun iscritto � stato trovato');
		}

		$paginator = new Paginator($itemsCount, $page, $blog_per_page,
				$page_range);

		$offset = ($page - 1) * $blog_per_page;
		$limit = $blog_per_page;

		$listauser = $this->getPagination($offset, $limit);

		return $this
				->render('AitamIndexBundle:Page:progetti.html.twig',
						array('listauser' => $listauser,
								'paginator' => $paginator));
	}

	public function getPagination($offset = 0, $limit = 0) {
		$em = $this->getDoctrine()->getEntityManager();

		$qb = $em->getRepository('ApplicationSonataUserBundle:user')
				->createQueryBuilder('u')->where('u.enabled = true')
				->addOrderBy('u.id', 'DESC');
		//var_dump($qb);
		if ((isset($offset)) && (isset($limit))) {
			if ($limit > 0) {
				$qb->setFirstResult($offset);
				$qb->setMaxResults($limit);
			}
		}

		return $qb->getQuery()->getResult();

	}

	public function getCount() {
		$em = $this->getDoctrine()->getEntityManager();
		//Create query builder for languages table
		$qb = $em->getRepository('ApplicationSonataUserBundle:user')
				->createQueryBuilder('u')->where('u.enabled = true');
		//Add Count expression to query
		$qb->add('select', $qb->expr()->count('u'));
		//Get our query
		$q = $qb->getQuery();
		//Return number of items
		return $q->getSingleScalarResult();
	}

}
