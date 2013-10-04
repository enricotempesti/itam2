<?php
namespace Application\Sonata\UserBundle\Repository;


use Doctrine\ORM\EntityRepository;

class LoginRepository extends EntityRepository{
	
	public function controllouserface() {
	
		return $this->getEntityManager()
		->createQuery('SELECT u.facebook_uid, FROM ApplicationSonataUserBundle:user u ')
	
		->getResult();
	}

}
