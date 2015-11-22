<html>
<link rel="stylesheet" type="text/css" href="style1.css" />
	<head>
		<title>Customer</title>
	</head>
	<body>
		<h1 align="center" style="font-family:arial; color:#FF0000;">Sirijaya Trading Pvt. Ltd.</h1>
		<a href = "http://localhost/CI/customer/add"><button type = "">Add Customer</button></a><br />
		<form action = "Delete.php" method = "POST">
		<p>Delete Customer:
		<br /><input type = "text" name = "delCustomer" /> </p>
		<input type = "submit" value = "Delete Customer" />
		</form>

		<a href = "http://localhost/CI/customer/update"><button type = "">Update Customer</button></a><br />
		
		<p>Enter Customer ID:<br /> <input type = "text" name = "searchItem" /> </p>
		<button type = "">Search Customer</button></a>
	</body>
</html>
