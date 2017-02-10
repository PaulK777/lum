#### Question

Create a controller to retrieve the patients, declare dependencies to avoid redundacy,
instead of $hospitalRepository = new \AppBundle\Repository\HospitalRepository(); use
$em = $this->getDoctrine()->getManager();
$hospitalRepository = $em->getRepository('AppBundle:Hospital');

