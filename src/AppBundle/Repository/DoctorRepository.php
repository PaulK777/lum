<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Hospital;

class DoctorRepository implements RepositoryInterface {

    /** @return Hospital */
    public function selectById($id) {
        $em = $this->getEntityManager();
        $repository = $em->getRepository('AppBundle:Doctor');
        return $repository->findOneById($id);
    }

}
