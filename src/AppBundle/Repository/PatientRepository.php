<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

class PatientRepository extends EntityRepository implements RepositoryInterface {

    /** @return Patient */
    public function selectById($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository('AppBundle:Patient');
        return $repository->findOneById($id);
    }

    /**
     * @param \AppBundle\Entity\Hospital $hospital
     * @return Patient[]
     */
    public function selectByHospital($hospital) {

        $query = $this->createQueryBuilder('p')
                ->addSelect('p')
                ->addSelect('p.name as PatientName')
                ->addSelect('h.name as HospitalName')
                ->leftJoin('AppBundle:Hospital', 'h', 'WITH', 'p.hospital = h.id')
                ->andWhere('p.hospital = :hospitalId')
                ->setParameter('hospitalId',$hospital);
        
        $data['results'] = $query->getQuery()->getArrayResult();

        return $data;
    }

    public function selectByDoctor($doctor) {

        $query = $this->createQueryBuilder('p')
                ->addSelect('p')
                ->addSelect('d.name as doctorName')
                ->addSelect('GROUP_CONCAT(p.name) as patientNames')
                ->leftJoin('AppBundle:Doctor', 'd', 'WITH', 'p.doctor = d.id')
                ->andWhere('p.doctor = :doctorId')
                ->setParameter('doctorId',$doctor);
        
        $data = $query->getQuery()->getArrayResult();

        return array_shift($data);
    }

}
