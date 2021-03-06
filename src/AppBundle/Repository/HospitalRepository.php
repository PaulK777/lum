<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Hospital;

class HospitalRepository extends EntityRepository implements RepositoryInterface {

    /** @return Hospital */
    public function selectById($id) {
        $em = $this->getEntityManager();
        $repository = $em->getRepository('AppBundle:Hospital');
        return $repository->findOneById($id);
    }

}
