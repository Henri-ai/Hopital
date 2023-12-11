<?php 

require_once __DIR__ . '/../models/Patient.php';

try {
    $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $search = filter_input(INPUT_GET,'search',FILTER_SANITIZE_SPECIAL_CHARS);
    $patients=Patient::getAll($search);
    
    if($id!=0){
        $delete=Patient::delete($id);
        $message = 'Patient supprimer ainsi que ses rendez-vous';
    }
//$page que l'on recup en get 
    $page=intval(filter_input(INPUT_GET,'page',FILTER_SANITIZE_NUMBER_INT));
// on appel la methode count qui nous renvoie le nombre de patient enregistrer
    $count=Patient::count();
// On détermine le nombre de patient par page
    $limit=10;
// on stock dans la variable pages le nombre de page que l'on a
    $pages=ceil($count/$limit);//ceil Arrondit au nombre supérieur
//si en get la variable page == 0 ou qu'elle est superieur au nombre de page on retourne sur la page 1
    if($page==0||$page>$pages){
        $page=1;
    }
    //on stock dans $start 10 * la page - 10 
    $start=($limit*$page)-$limit;
    $patients=Patient::pagination($start);
} catch (\Throwable $th) {
    throw $th;
}


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/patients/listPatient.php';
include __DIR__ . '/../views/templates/footer.php';

?>