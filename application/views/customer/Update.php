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

$sql = "UPDATE Customer SET FName = '$fname', LName = '$lname', Gender = '$gender', Address = '$address', TelePhone = '$phone', Email = '$email', Bday = '$bday' WHERE FName = '$fname'";
if($link->query($sql) == TRUE){
	echo "Record Updated sucessfully";
}else{
	echo "Error updating record :" .$link->error;
}

$link ->close();
?>