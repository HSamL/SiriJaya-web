<html>
	<head>
		<title>Demo shopping Cart</title>
	</head>
	<body>
	This is a demonstration
	<?php
		$this->load->library('table');

		$this->table->set_heading('Id', 'Name', 'Price','Available Quantity','add to cart');
		foreach($prodList as $p)
			$this->table->add_row($p->id,$p->name,$p->price,$p->quantity,anchor('/shoppingcart/buy/'.$p->id,'Order NOW'));
		$this->table->set_template(array('table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">'));
		echo $this->table->generate();
		
		?>
	</body>
</html>