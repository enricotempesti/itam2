<?php

namespace Aitam\OpportunitaBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OpportunitaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OpportunitaRepository extends EntityRepository
{
	
	public function getLatestOpportunita($limit = null)
	{
		$qb = $this->createQueryBuilder('o')
		->select('o')
		->leftJoin('o.commentiopportunita', 'c')
		->addOrderBy('o.created', 'DESC');
	
		if (false === is_null($limit))
			$qb->setMaxResults($limit);
	
		return $qb->getQuery()
		->getResult();
	}
	
	public function getBlogOpportunita($limit = null)
	{
		$qb = $this->createQueryBuilder('o')
		->select('o')
		->leftJoin('o.commentiopportunita', 'c')
		->addOrderBy('o.created', 'DESC');
	
		if (false === is_null($limit))
			$qb->setMaxResults($limit);
	
		return $qb->getQuery()
		->getResult();
	}
	
	public function getPagination($offset = 0, $limit = 0) {
	
		$qb = $this->createQueryBuilder('o')
		->addOrderBy('o.created', 'DESC');
	
		if ((isset($offset)) && (isset($limit))) {
			if ($limit > 0) {
				$qb->setFirstResult($offset);
				$qb->setMaxResults($limit);
			}
		}
	
		$q = $qb->getQuery();
	
		return $q->getResult();
	}
	
	public function getCount() {
		//Create query builder for languages table
		$qb = $this->createQueryBuilder('o');
		//Add Count expression to query
		$qb->add('select', $qb->expr()->count('o'));
		//Get our query
		$q = $qb->getQuery();
		//Return number of items
		return $q->getSingleScalarResult();
	}
		
}