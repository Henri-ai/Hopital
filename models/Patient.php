<?php 
    require_once __DIR__.'/../helpers/connect.php';

class Patient {
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    

    // public function __construct(int $id,string $lastname,string $firstname,string $birthdate,string $phone,string $mail)//Ces méthodes permettent de réaliser des actions à la construction de l'objet
    // {
    //     $this->setId($id);
    //     $this->setLastname($lastname);
    //     $this->setFirstname($firstname);
    //     $this->setBirthdate($birthdate);
    //     $this->setPhone($phone);
    //     $this->setMail($mail);

    // }

//id----------------------------------------------------------------------------------------------------
    public function getId() : int {
    return $this->id;
    }
    public function setId(int $id) {//set = definir une valeur a une propriéter de la classe
        $this->id=$id;
    }
//lastname------------------------------------------------------------------------------------------------
    public function getLastname() : string {
        return $this->lastname;
    }
    public function setLastname(string $lastname)  {
        $this->lastname=$lastname;
    }
//firstname-----------------------------------------------------------------------------------------------
    public function getFirstname() : string {
        return $this->firstname;
    }
    public function setFirstname(string $firstname){
        $this->firstname=$firstname;
    } 
//date de naissance---------------------------------------------------------------------------------------
    public function getBirthdate() : string {
        return $this->birthdate;
    }
    public function setBirthdate(string $birthdate) {
        $this->birthdate=$birthdate;
    }
//telephone-----------------------------------------------------------------------------------------------
    public function getPhone() : string {
        return $this->phone;
    }
    public function setPhone(string $phone) {
        $this->phone=$phone;
    }
//mail----------------------------------------------------------------------------------------------------
    public function getMail() : string {
        return $this->mail;
    }
    public function setMail(string $mail){
        $this->mail=$mail;
    }
    
    public function add(){
        $db = connect();
        $sql=('INSERT INTO `patients` (`lastname`,`firstname`,`birthdate`,`phone`,`mail`) 
                VALUES (:lastname,:firstname,:birthdate,:phone,:mail)');
        $sth = $db->prepare($sql);//si une donnée viens de l'extérieur on prépare()&execute() sinon query()
        $sth->bindValue(':lastname',$this->lastname);//bindValue:Lie une valeur à un paramètre // this->_lastname ou alors $this->getLastname()
        $sth->bindValue(':firstname',$this->firstname);//$sth variable de type PDOStatement
        $sth->bindValue(':birthdate',$this->birthdate);//:birthdate etc = marqueur nominatif
        $sth->bindValue(':phone',$this->phone);
        $sth->bindValue(':mail',$this->mail);//
        return $sth->execute();
    }

    public static function getAll($search=null){
        $db = connect();
        $sql='SELECT *
        FROM `patients` ';
        if (!empty($search)){
            $sql .= 'WHERE `patients`.`lastname` LIKE :search OR patients.firstname LIKE :search ;';
        }
        $sth=$db->prepare($sql);
        if (!empty($search)){
            $sth->bindValue(':search','%'.$search.'%');
        }
        $sth->execute();
        return $sth->fetchAll();//fetchall retourne un tableau d'objet
    }

    public function isExist(){
        $db=connect();
        $sql=('SELECT `patients`.`mail` 
        FROM `patients` WHERE `patients`.`mail`=:mail');
        $sth=$db->prepare($sql);
        $sth->bindValue(':mail',$this->mail);//bindValue : Associe une valeur à un paramètre
        $sth->execute();
        return $sth->fetch();
    }
    
    public static function get($id){// remplacer le nom de la methode avec get
        $db=connect();
        $sql=('SELECT * FROM `patients` WHERE `patients`.`id`=:id');
        $sth=$db->prepare($sql);//si donnée externe on fait un query 
        $sth->bindValue(':id',$id);// premier parametre -> marqueur nominatif / deuxieme paramétre -> la valeur
        $sth->setFetchMode(PDO::FETCH_CLASS,"Patient");
        $sth->execute();// retourne un boolean
        $displayProfil = $sth->fetch();// fetch retourne que le premier resultat
        return $displayProfil;
    }

    public function update():bool{
        $db=connect();
        $sql=('UPDATE `patients` SET `lastname`=:lastname,`firstname`=:firstname,`birthdate`=:birthdate,`phone`=:phone,`mail`=:mail WHERE `id`=:id;');
        $sth=$db->prepare($sql);
        $sth->bindValue(':id',$this->id);
        $sth->bindValue(':lastname',$this->lastname);
        $sth->bindValue(':firstname',$this->firstname);
        $sth->bindValue(':birthdate',$this->birthdate);
        $sth->bindValue(':phone',$this->phone);
        $sth->bindValue(':mail',$this->mail);
        return $sth->execute();
    }

    public static function delete($id):bool{
        $db=connect();
        $sql=('DELETE FROM `patients`
            WHERE patients.id=:id;');
        $sth=$db->prepare($sql);
        $sth->bindValue('id',$id);
        return $sth->execute();
    }

    public static function count(){
        $db=connect();
        $sql=('SELECT COUNT(*) AS `nbrPatients` FROM `patients`;');
        $sth=$db->query($sql);
        return $sth->fetchColumn();
    }

    public static function pagination($start=0){
        $db=connect();
        $sql=('SELECT * FROM `patients` LIMIT 10 OFFSET :start;');
        $sth=$db->prepare($sql);
        $sth->bindValue('start',$start,PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll();
    }
    
}
