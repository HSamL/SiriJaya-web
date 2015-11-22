<?php
define('DB_Name', 'Assignment');
define('DB_User', 'root');
define('DB_Password', '');
define('DB_Host', 'localhost');

$link = new mysqli(DB_Host, DB_User, DB_Password,DB_Name);
if(!$link){
	die('Could not connect: ' .mysql_error());
}

$del = $_POST['delCustomer'];

header("file:///C:/wamp/www/DB-PHP/Customer.html");

$sql = "DELETE FROM Customer WHERE Cus_ID = ".$del;

if($link->query($sql) == TRUE){
	echo "Record deleted sucessfully";
}else{
	echo "Error deleting record :" .$link->error;
}

$link ->close();
?>