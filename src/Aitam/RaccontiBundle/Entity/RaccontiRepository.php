<?php

namespace Aitam\RaccontiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * RaccontiRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RaccontiRepository extends EntityRepository {


    public function getphotoracconti($limit = null) {

                $qb = $this->createQueryBuilder('r')
                ->select('r')
                ->where('r.isactive = 1')
                ->addOrderBy('r.created', 'DESC');

        if (false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()
                        ->getResult();

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

}
