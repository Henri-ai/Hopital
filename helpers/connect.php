<?php 
require_once __DIR__.'/../config/config.php';

function connect(){

    $db = new PDO(DSN,USER,PASSWORD); //DSN Data Source Name / $db est un objet de type pdo 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); //setAttribute= methode elle att 2 param sert à modifier la valeur part default
    return $db;

}



?>