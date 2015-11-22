<?php
define('DB_Name', 'Assignment');
define('DB_User', 'root');
define('DB_Password', '');
define('DB_Host', 'localhost');

$link = new mysqli(DB_Host, DB_User, DB_Password,DB_Name);

if(!$link){
	die('Could not connect: ' .mysql_error());
}


$fname = $_POST['FName'];
$lname = $_POST['LName'];
$gender = $_POST['Gender'];
$address = $_POST['Address'];
$phone = $_POST['TelePhone'];
$email = $_POST['Email'];
$bday = $_POST['Bday'];

$sql = "INSERT INTO Customer(FName, LName, Gender, Address, TelePhone, Email, Bday ) VALUES ('$fname', '$lname', '$gender', '$address', '$phone', '$email', '$bday')";

if($link->query($sql) == TRUE){
	echo "Record Added sucessfully";
}else{
	echo "Error adding record :" .$link->error;
}

$link ->close();
?>