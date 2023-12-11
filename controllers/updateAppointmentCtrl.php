<?php 
require_once __DIR__ . '/../config/config.php';
require_once __DIR__.'/../models/Appointment.php';
require_once __DIR__.'/../models/Patient.php';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));//intval ->transforme en un entier
$patients=Patient::getAll();


try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patientAppointment= trim(filter_input(INPUT_POST, 'patientAppointment', FILTER_SANITIZE_NUMBER_INT));
    if(empty($patientAppointment)) {
        $error['patientAppointment']='Veuillez sélectionner un patient';
    }

    $dateAppointment = filter_input(INPUT_POST, 'dateAppointment', FILTER_SANITIZE_NUMBER_INT);
    if (empty($dateAppointment)) {
        $error['dateAppointment'] = "Veuillez saisir la date du rendez-vous";
    }

    $hourAppointment= trim(filter_input(INPUT_POST, 'hourAppointment', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($hourAppointment)) {
        $error['hourAppointment']='Veuillez sélectionner une heure de rendez-vous';
    } else {
        if(in_array($hourAppointment, HOUR)==false) {
            $error['hourAppointment']='l\'heure ne convient pas';
        }
    }
    if(empty($error)){
        $appointments=new Appointment();
        $dateAndHour=$dateAppointment.' '.$hourAppointment;
        $appointments->setDateHour($dateAndHour);
        $appointments->setIdPatients($patientAppointment);
        $appointments->setId($id);
        $appointments->update();
        
    }
    header('location: ../controllers/listAppointmentCtrl.php');
}

} catch (\Throwable $th) {
    throw $th;
}


$appointment=Appointment::get($id);




include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointments/updateAppointment.php';
include __DIR__ . '/../views/templates/footer.php';