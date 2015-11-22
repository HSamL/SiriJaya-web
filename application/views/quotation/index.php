<html>
<head>
	<title>Home Page for this Assignment</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>Quotation Management</h1>
<?php
if($utype==='customer'){
	echo "<h2>Customer Tasks</h2>
<ul>
	<li><a href='/CI/quotation/request'>The form used by the customer to request a quotation from the business</a></li>
	<li><a href='/CI/quotation/update'>The page used by the customers to view and delete quotations sent to the business</a></li>
</ul>";
}
elseif($utype==='business'){
	echo "
<h2>Business Tasks</h2>
<ul>
	<li><a href='/CI/quotation/review'>The page for the business to view and eventually accept or reject quotations</a></li>
</ul>";
}
?>
</body>
</html>