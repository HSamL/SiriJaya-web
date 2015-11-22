<html>
<head>
	<title>Update Quotation</title>
<?php
$idError="";
if(isset($_POST['submit'])){
	if(empty($_POST['cid'])){
		$idError="This field is required";
	}else{
		$cid=test_input($_POST['cid']);
		$db=mysqli_connect('localhost','root','','Hardware');
		$query="SELECT * FROM Quotation WHERE CustomerID='$cid'";
		$result=mysqli_query($db,$query);
		mysqli_close($db);
	}
}


function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}		
	

?>

<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<h1>Delete Quotation</h1>
<p>This form will be used by the customer to view details that have not been accepted or rejected by the business and then delete it...</p>

<form name="Search" id="search" action="" method="post">
	<input type="text" id="cid" name="cid" ><span class="warning">*<?php echo $idError; ?></span>
	<input type="submit" id="submit" name="submit" value="Get My Quotes">
	<br><br>

<?php
if(isset($result)){
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Quotation No</th>";
	echo "<th>Date</th>";
	echo "<th>Time</th>";
	echo "<th>Delete</th>";
	echo "</tr>";
	while($row=mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['QuotationNo']."</td>";
		echo "<td>".$row['Date']."</td>";
		echo "<td>".$row['Time']."</td>";
		echo "<td><a href=\"QuotationDetailUser.php?qNO=".$row['QuotationNo']."\">Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</form>
<a href="/CI/quotation/index/customer">Home</a>
</body>
</html>