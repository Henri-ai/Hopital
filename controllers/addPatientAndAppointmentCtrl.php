<?php 
require_once __DIR__ . '/../config/config.php';
require_once __DIR__.'/../models/Appointment.php';
require_once __DIR__.'/../models/Patient.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //lastname-------------------------------------------------------------------------------------------------------------------------------------
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $error['lastname'] = 'Veuillez saisir le nom du patient';
    } else {
        $validateLastname = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if ($validateLastname == false) {
            $error["lastname"] = "Le Nom n'est pas au bon format !";
        }
    }
    //firstname------------------------------------------------------------------------------------------------------------------------------------
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $error['firstname'] = 'Veuillez saisir le prénom du patient';
    } else {
        $validateFirstname = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if ($validateFirstname == false) {
            $error['firstname'] = "le Prénom n'est pas au bon format !";
        }
    }
    //birthdate------------------------------------------------------------------------------------------------------------------------------------
    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_NUMBER_INT);
    if (empty($birthdate)) {
        $error['birthdate'] = "Veuillez saisir la date de naissance du patient";
    } else {
        $validateBirthdate = filter_var($birthdate, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
        if ($validateBirthdate == false) {
            $error["birthdate"] = "La date entrée n'est pas valide!";
        }
        if ($birthdateObj = new DateTime($birthdate)) {
            // Calcul de l'age de l'utilisateur (année courante - année de naissance)
            $age = date('Y') - $birthdateObj->format('Y');
            if ($age > 120 || $age < 0) {
                $error["birthdate"] = "Votre age n'est pas conforme!";
            }
        }
    }
    //phone------------------------------------------------------------------------------------------------------------------------------------
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
    if (!empty($phone)) {
        $validatePhone = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
        if ($validatePhone==false) {
            $error['phone'] = 'le numero de téléphone n\'est pas valide';
        }
    }
    //mail------------------------------------------------------------------------------------------------------------------------------------
    $mail=trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
    if (empty($mail)) {
        $error['mail']='Veuillez saisir l\'adresse mail du patient';
    } else {
        $testEmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if ($testEmail==false) {
            $error["mail"] = "L'adresse email n'est pas au bon format!!";
        }
    }
    // date appointment-------------------------------------------------------------------------------------------------------------------------
    $dateAppointment = filter_input(INPUT_POST, 'dateAppointment', FILTER_SANITIZE_NUMBER_INT);
    if (empty($dateAppointment)) {
        $error['dateAppointment'] = "Veuillez saisir la date du rendez-vous";
    }
    // hour appointment--------------------------------------------------------------------------------------------------------------------------
    $hourAppointment= trim(filter_input(INPUT_POST, 'hourAppointment', FILTER_SANITIZE_SPECIAL_CHARS));
    if(empty($hourAppointment)) {
        $error['hourAppointment']='Veuillez sélectionner une heure de rendez-vous';
    } else {
        if(in_array($hourAppointment, HOUR)==false) {
            $error['hourAppointment']='l\'heure ne convient pas';
        }
    }
}

include __DIR__ . '/../views/templates/header.php';
    include(__DIR__ . '/../views/addPatientAndAppointment.php');
include __DIR__ . '/../views/templates/footer.php';
