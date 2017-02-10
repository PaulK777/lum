<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Patient;

class HospitalPatientsController extends Controller {

    public function indexAction(Request $request) {
        $response = 'Homepage';
        return new Response(
                '<html><body>' . $response . '</body></html>'
        );
    }

    function getDoctorPatientsAction(Request $request) {

        $doctorId = $request->get('doctorId');

        if (empty($doctorId)) {
            return new JsonResponse(array(
                'msg' => 'No information on this doctor'
            ));
        }
        $em = $this->getDoctrine()->getManager();
        $patientRepository = $em->getRepository('AppBundle:Patient');
        $doctor = $patientRepository->selectByDoctor($doctorId);
        
        // Return a list of patients along with the original hospital and a message showing success
        return new JsonResponse(array(
            'doctor' => $doctor['doctorName'],
            'patients' => $doctor['patientNames'],
            'msg' => 'Here are the patients for ' . $doctor['doctorName']
        ));
    }
    
    function savePatientAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $name = $request->request->get('name');
        $gender = $request->request->get('gender');
        $dob = $request->request->get('dob');
        $doctor = $request->request->get('doctor');
        $hospital = $request->request->get('hospital');

        $patient = new Patient();
        $patient->setId($id);
        $patient->setName($name);
        $patient->setGender($gender);
        $patient->setDob($dob);
        $patient->setDoctor($doctor);
        $patient->setDoctor($hospital);
        $em->persist($patient);
        $em->flush();

        return new Response('Saved new patient with id ' . $patient->getId());
    }   

}
