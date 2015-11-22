<html>
<head>
	<title>Request Quotation</title>
	<script type="text/javascript">
		var item_count=1;
		
		function add(){
			var newDiv = document.createElement('div');
			newDiv.setAttribute('id',"itemDiv_"+item_count);
			newDiv.innerHTML = "Item: <input type='text' name='item_"+item_count+"' id='item_"+item_count+"'> Quantity: <input type='text' name='quan_"+item_count+"' id='quan_"+item_count+"'><input type='button' id='remove_"+item_count+"' name='remove_"+item_count+"' value='Remove' onclick='removeDiv("+item_count+")'>";
			document.getElementById('quotItems').appendChild(newDiv);
			item_count++;
			
		}
		
		function removeDiv(idNum){
			var remDiv = "itemDiv_"+idNum;
			var remItem = document.getElementById(remDiv);
			remItem.parentNode.removeChild(remItem);
				var lastInd = item_count-1;
				var lastDiv = document.getElementById("itemDiv_"+lastInd);
				var lastItem = document.getElementById("item_"+lastInd);
				var lastQuan = document.getElementById("quan_"+lastInd);
				var lastButt = document.getElementById("remove_"+lastInd);
				lastDiv.setAttribute('id',"itemDiv_"+idNum);
				lastItem.setAttribute('id',"item_"+idNum);
				lastItem.setAttribute('name',"item_"+idNum);
				lastQuan.setAttribute('id',"quan_"+idNum);
				lastQuan.setAttribute('name',"quan_"+idNum);
				lastButt.setAttribute('id',"remove_"+idNum);
				lastButt.setAttribute('name',"remove_"+idNum);
				lastButt.setAttribute('onclick',"removeDiv("+idNum+")");
				item_count--;
		}
		
	</script>

<?php

	$idError=$itemError=$quanError="";	
		
	if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['submit'])){
		$db = mysqli_connect('localhost','root','','Hardware');
		$query = "SELECT MAX(QuotationNo) AS QNo FROM Quotation";
		$result = mysqli_query($db,$query);
		$row = mysqli_fetch_assoc($result);
		if($row['QNo']!=NULL){
			$num = $row['QNo']+1;
		}else{
			$num=0;
		}
		$cusID = test_input($_POST['cid']);
		if(empty($_POST['cid'])){
			$idError="cannot be emptypty";
		}
		$dateQ=date('Y-m-d');
		$timeQ=date('H:i');
		$query="INSERT INTO quotation (QuotationNo, CustomerID, Date, Time) VALUES ('$num','$cusID','$dateQ','$timeQ')";
		$result=mysqli_query($db,$query);
		$item_count=0;
		$more=TRUE;
		while($more){
			$name="item_".$item_count;
			if(isset($_POST[$name])){
				if(!empty($_POST[$name])){
					$item=test_input($_POST[$name]);
					$qname="quan_".$item_count;
					if(!empty($_POST[$qname])){
						$quan=test_input($_POST[$qname]);
						$query="INSERT INTO quotation_item (QuotationNo, Item_Name, Quantity) VALUES ('$num','$item','$quan')"	;
						$result=mysqli_query($db,$query);
					}else{
						$quanError="Quantity cannot be empty";
					}
				}else{
					$itemError="Item cannot be empty or delete empty field";
				}			
			}else{
				$more=FALSE;
			}
			$item_count++;
		}
		mysqli_close($db);
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
	<h1>Request a Quotation</h1>
	<p>This form will be used by a customer of the business to request a quotation</p>
	
	<form id="reqQuot" name="reqQuot" action="" method="post">
	<table>
		<tr><td>Customer ID: <td><input type="text" name="cid" id="cid" ><span class="warning">*<?php echo $idError; ?></span></tr>
		<tr><td>Date: <td><input type="text" name="date" id="date" value="<?php echo date('Y-m-d'); ?>"></tr>
		<tr><td>Time: <td><input type="text" name="time" id="time" value="<?php echo date('H:i'); ?>"></tr>
		<tr><td colspan="2">
		<fieldset id="quotItems" name="quotItems" style="border:0;">
			<div id="itemDiv_0">
				Item: <input type="text" name="item_0" id="item_0"> Quantity: <input type="text" name="quan_0" id="quan_0"><input type="button" id="remove_0" name="remove_0" value="Remove" onClick="removeDiv(0)">
			</div>
		</fieldset>
		</td></tr>
		<tr><td><input type="button" id="addMore" name="addMore" value="Add More" onClick="add()"><td><span class="warning">*<?php echo $itemError; ?><br><?php $quanError; ?></span></tr>
		<tr><td><input type="submit" id="submit" name="submit" value="Submit Quotation">
		<td><input type="reset" id="reset" name="reset" value="Reset"></tr>
	</table>
	</form>
	<a href="/CI/quotation/index/customer">Home</a>
</body>

</html>