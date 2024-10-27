<?php
class Database{
    public $db;
    public function getConnection(){
        $this->db=null;
        try{
            $this->db=new PDO("mysql:host=localhost;dbname=flightpool", "root", '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database connection established";
        }
        catch(Exception $e){
            echo "Database could not be connected: " . $e->getMessage();
        }
        return $this->db;
        return $con;
    }
}
?>