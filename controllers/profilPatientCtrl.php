<?php 
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Appointment.php';

try {
    $appointments=new Appointment();
    $id=intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $patients=Patient::get($id);
    $infos=Appointment::getAppointment($id);
    
    if ($patients==false) {
        throw new Exception("le patient n'a pas été trouvé");
    }
}catch (\Throwable $th){
    throw $th;
}
include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/patients/profilPatient.php';
include __DIR__ . '/../views/templates/footer.php';

?>