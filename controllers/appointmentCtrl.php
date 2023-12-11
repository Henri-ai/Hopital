<?php 
require_once __DIR__ . '/../models/Appointment.php';


try {
    $id=intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $appointments=Appointment::get($id);
    $format=$appointments->dateHour;
    $formatFrench=date('d/m/Y H:i',strtotime($format));

    if ($appointments==false) {
        throw new Exception("le patient n'a pas été trouvé");
    }
}catch (\Throwable $th){
    throw $th;
}

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/appointments/appointment.php';
include __DIR__ . '/../views/templates/footer.php';
