<?php
 
namespace Aitam\AgendaBundle\Repository;
 
use Doctrine\ORM\EntityRepository;
 
/**
 * MynewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MynewsRepository extends EntityRepository
{
 
	public function getAgendasql() {
		
        return $this->getEntityManager()
            ->createQuery('SELECT m.id,m.newsdata,m.newstitle,m.newslink,m.infoevento FROM AitamAgendaBundle:mynews m ')
 
        ->getResult();
	}
        
	public function trovaevento() {
            
            
          
           return $this->getEntityManager()
          ->createQuery(
          'SELECT m.id,m.newsdata,m.newstitle,m.infoevento FROM AitamAgendaBundle:mynews m 
              '
          )->getResult();
          
             //$query = $repository->createQueryBuilder('m')
             //->where('m.newsdata = m.newstitle')
             //->setParameter('price', '19.99')
             //->orderBy('p.price', 'ASC')
             //->getQuery();

             //$mostraevento = $query->getResult();
        }
        
        public function trovadata(){
             return $this->getEntityManager()
          ->createQuery(
          'SELECT m.id,m.newsdata,m.newstitle FROM AitamAgendaBundle:mynews m 
              '
          )->getResult();
        }
}