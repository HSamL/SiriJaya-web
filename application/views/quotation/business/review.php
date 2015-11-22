<html>
<head>
	<title>View Quotation</title>

<?php
	$db=mysqli_connect('localhost','root','','Hardware');
	$query="SELECT * FROM Quotation WHERE Status IS NULL";
	$result=mysqli_query($db,$query);
	mysqli_close($db);
?>	
	
<link href="style.css" rel="stylesheet" type="text/css">	
</head>

<body>
<h1>View Quotations</h1>
<p>The business can view the quotations needing review on this page</p>
<table border="1">
	<tr>
		<th>Quotation Number</th>
		<th>Customer ID</th>
		<th>Date</th>
		<th>Time</th>
		<th>View</th>
	</tr>
<?php
while($row=mysqli_fetch_assoc($result)){
	echo "<tr>";
		echo "<td>".$row['QuotationNo']."</td>";
		echo "<td>".$row['CustomerID']."</td>";
		echo "<td>".$row['Date']."</td>";
		echo "<td>".$row['Time']."</td>";
		echo "<td><a href=\"QuotationDetail.php?qNO=".$row['QuotationNo']."\">View</a></td>";
	echo "</tr>";
}
?>
</table>
<a href="index.php">Home</a>
</body>
</html>