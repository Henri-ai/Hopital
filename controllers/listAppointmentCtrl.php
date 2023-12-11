<?php 
require_once __DIR__ . '/../config/config.php';
require_once __DIR__.'/../models/Appointment.php';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));//intval transforme en un entier
    $patients=Appointment::list();
    if (isset($_GET['action'])){
        if ($_GET['action']=='delete'){
        $appointment=Appointment::delete($id);
        header('location: /controllers/listAppointmentCtrl.php');
    }
    }
} catch (\Throwable $th) {
    throw $th;
}








include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/appointments/listAppointment.php';
include __DIR__ . '/../views/templates/footer.php';

