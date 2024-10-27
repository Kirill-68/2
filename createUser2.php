<?php
include_once 'queries2.php';
include_once 'register2.php';
$database=new Database();
$db=$database->getConnection();
$item=new Library($db);
$item->usfname=$_GET['first_name'];
$item->uslname=$_GET['last_name'];
$item->usphone=$_GET['phone'];
$item->usdcmnum=$_GET['document_number'];
if($item->createUser()){
        echo "User connected acsessfully.";
    }
else{
    echo "User could not be created.";
}
?>