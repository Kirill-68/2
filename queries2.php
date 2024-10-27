<?php
class Library{
    private $db;
    private $tableUser="users";
    public $user_id;
    public $usfname;
    public $uslname;
    public $usphone;
    public $usdcmnum;
    public $uspassword;
public function __construct($db){
    $this->db=$db;
}
public function getUser(){
    $sql="SELECT * FROM" . $this->tableUser . "";
    $this->result=$this->db->query($sql);
    return $this->result;
}
public function createUser(){
    $this->usfname=htmlspecialchars(strip_tags($this->usfname));
    $this->uslname=htmlspecialchars(strip_tags($this->uslname));
    $this->usphone=htmlspecialchars(strip_tags($this->usphone));
    $this->usdcmnum=htmlspecialchars(strip_tags($this->usdcmnum));
    $this->user_id=$_GET['id'];
    $query="INSERT INTO Users (`id`,`first_name`, `last_name`, `phone`, `document_number`, `password`) VALUES ('$this->user_id','$this->usfname', '$this->uslname', '$this->usphone', '$this->usdcmnum', '$this->uspassword')";
    try{
        $con=new PDO("mysql:host=localhost;dbname=flightpool", "root", '');
        $affectedRowsNumber = $con->exec($query);
        if($affectedRowsNumber > 0){
        return true;
    }
    else{
        echo "2";
    }
}
    catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
    return false;
}
public function searchUser(){
    $sql="SELECT * FROM". $this->tableUser ." WHERE id = ".$this->user_id;
    $record=$this->db->query($sql);
    $row=$record->fetch_assoc();
    $this->usfname=$row['first_name'];
    $this->uslname=$row['last_name'];
    $this->usphone=$row['phone'];
    $this->usdcmnum=$row['document_number'];
    $this->uspassword=$row['password'];
}
}
?>