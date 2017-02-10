<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PatientRepository")
 * @ORM\Table(name="patient")
 */
class Patient {

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime")
     */
    private $dob;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer", length=11)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="hospital", type="integer", length=11)
     */
    private $hospital;

    /**
     * @var int
     *
     * @ORM\Column(name="doctor", type="integer", length=11)
     */
    private $doctor;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Patient
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Patient
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDob() {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     * @return Patient
     */
    public function setDob($dob) {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Patient
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return Hospital
     */
    public function getHospital() {
        return $this->hospital;
    }

    /**
     * @param Hospital $hospital
     * @return Patient
     */
    public function setHospital($hospital) {
        $this->hospital = $hospital;
        return $this;
    }

    /**
     * @return Doctor
     */
    public function getDoctor() {
        return $this->doctor;
    }

    /**
     * @param Doctor $doctor
     * @return Patient
     */
    public function setDoctor($doctor) {
        $this->doctor = $doctor;
        return $this;
    }

}
