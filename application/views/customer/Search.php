<?php
define('DB_Name', 'Assignment');
define('DB_User', 'root');
define('DB_Password', '');
define('DB_Host', 'localhost');

$link = new mysqli(DB_Host, DB_User, DB_Password,DB_Name);

if(!$link){
	die('Could not connect: ' .mysql_error());
}

if(isset($_POST['searchquery']) && $_POST['searchquery'] != ""){
	
}
$sql = "SELECT * FROM Customer WHERE field LIKE '%searchquery%'";

$query = mysql_query($sql) or die(mysql_error());
$count = mysql_num_rows($query);
if ($count > 1) {
	$search_output = "<hr> $count results for <strong> $searchquery</strong><hr /> $sql <hr />";
	while ($row = mysql_fetch_array($query)) {
		$id = $row["Cus_ID"];
		$fname = $row["FName"];
		$lname = $row["LName"];
		$gender = $row["Gender"];
		$address = $row["Address"];
		$telephone = $row["TelePhone"];
		$email = $row["Email"];
		$bday = $row["Bday"];
	}
}else{
	$search_output = "<hr /> 0 results for <strong> $searchquery </strong><hr />$sql";
}
/*if($link->query($sql) == TRUE){
	echo "Record Added sucessfully";
}else{
	echo "Error adding record :" .$link->error;
}*/

$link ->close();
?>

<html>
	<head>
	</head>
	<body>
		<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
		Search : <input name="searchquery" type = "text" size="80" maxlength="88">
		<input name="search" type="submit">
		</form>
		<div>
			<?php echo $search_output;?>
		</div>
	</body>
</html>