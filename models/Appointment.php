<?php 
    require_once __DIR__.'/../helpers/connect.php';
    require_once __DIR__ . '/../models/Patient.php';
class Appointment {

private int $id;
private string $dateHour;
private int $idPatients;

// public function __construct(int $id,string $dateHour, int $idPatients)
// {
//     $this->setId($id);
//     $this->setDateHour($dateHour);
//     $this->setIdPatients($idPatients);
// }

//id-------------------------------------------------------------------------
public function getId():int {
    return $this->id;
}
public function setId(int $id) {
    $this->id=$id;
}
//dateHour-------------------------------------------------------------------
public function getDateHour():string {
    return $this->dateHour;
}
public function setDateHour(string $dateHour) {
    $this->dateHour=$dateHour;
}
//id patients-----------------------------------------------------------------
public function getIdPatients(): int{
    return $this->idPatients;
}
public function setIdPatients(int $idPatients) {
    $this->idPatients=$idPatients;
}

public function addAppointment(){
    $db = connect();
        $sql='INSERT INTO `appointments` (`dateHour`,`idPatients`)
                VALUES (:dateHour,:idPatients);';
        $sth = $db->prepare($sql);
        $sth->bindValue(':dateHour',$this->dateHour);
        $sth->bindValue(':idPatients',$this->idPatients);
        return $sth->execute();
}


public static function list():array{
    $db = connect();
    $sql=('SELECT `appointments`.`id` AS `idAppointments`,`patients`.`lastname`,`patients`.`firstname`,`appointments`.`dateHour`
    FROM `appointments`
    INNER JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id`');
    $sth = $db->query($sql);
    return $sth->fetchAll();//fetchall retourne un tableau d'objet
}


public static function get($id){
    $db=connect();
        $sql=('SELECT `appointments`.`id` AS `idAppointments`,`appointments`.`dateHour`,`appointments`.`idPatients`,`patients`.`lastname`,`patients`.`firstname`
        FROM `appointments` 
        INNER JOIN `patients` 
        ON `appointments`.`idPatients`=`patients`.`id`
        WHERE `appointments`.`id`=:id;');
        $sth=$db->prepare($sql);//si donnée externe on fait un query 
        $sth->bindValue(':id',$id);// premier parametre -> marqueur nominatif / deuxieme paramétre -> la valeur
        $sth->execute();// retourne un boolean
        return $sth->fetch();// fetch retourne que le premier resultat
}

public function update():bool{
    $db=connect();
    $sql=('UPDATE `appointments` SET `idPatients`=:idPatients,`dateHour`=:dateHour WHERE `id`=:id;');
    $sth=$db->prepare($sql);
    $sth->bindValue(':idPatients',$this->idPatients);
    $sth->bindValue(':id',$this->id);
    $sth->bindValue(':dateHour',$this->dateHour);
    return $sth->execute();
}

public static function getAll(){
    $db = connect();
    $sql=("SELECT `appointments`.`id` AS `idAppointments`,
        `appointments`.`dateHour`,
        `appointments`.`idPatients`,
        `patients`.`lastname`,
        `patients`.`firstname` 
        FROM `appointments` 
        INNER JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id`;");
        $sth=$db->query($sql);
        return $sth->fetchAll();
}

public static function getAppointment($id){
    $db = connect();
    $sql=("SELECT `appointments`.`id` AS `idAppointments`,`appointments`.`dateHour`,`appointments`.`idPatients`,`patients`.`lastname`,`patients`.`firstname`
    FROM `appointments` 
    INNER JOIN `patients` ON `appointments`.`idPatients`=`patients`.`id` 
    WHERE `patients`.`id`=:id;");
    $sth=$db->prepare($sql);
    $sth->bindValue(':id',$id);
    $sth->execute();
    return $sth->fetchAll();

}

public static function delete($id):bool{
    $db = connect();
    $sql=('DELETE 
    FROM appointments
    WHERE appointments.id=:id;');
    $sth=$db->prepare($sql);
    $sth->bindValue('id',$id);
    return $sth->execute();
}

}


















?>