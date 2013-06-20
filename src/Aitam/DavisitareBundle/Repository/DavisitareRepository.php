<?php

namespace Aitam\DavisitareBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DavisitareRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DavisitareRepository extends EntityRepository
{
	
	public function getLatestDavisitare($limit = null)
	{
		$qb = $this->createQueryBuilder('d')
		->select('d')
		->leftJoin('d.commentidavisitare', 'c')
		->addOrderBy('d.created', 'DESC');
	
		if (false === is_null($limit))
			$qb->setMaxResults($limit);
	
		return $qb->getQuery()
		->getResult();
	}
	
	public function getBlogDavisitare($limit = null)
	{
		$qb = $this->createQueryBuilder('d')
		->select('d')
		->leftJoin('d.commentidavisitare', 'c')
		->addOrderBy('d.created', 'DESC');
	
		if (false === is_null($limit))
			$qb->setMaxResults($limit);
	
		return $qb->getQuery()
		->getResult();
	}
		
}