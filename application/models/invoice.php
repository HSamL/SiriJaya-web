<?php

class Invoice extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function getInd(){
		$query=$this->db->query("SELECT MAX(InvoiceNum) AS max FROM Invoice");	
		$row = $query->row();
		return ($row->max)+1;
	}
	
	function recordInv($invId,$date,$custID=0){
		$data=array(
			'InvoiceNum'=>$invId,
			'date'=>$date,
			'customerid'=>$custID
		);
		
		$this->db->insert('invoice',$data);
	}
	
	function recordItems($invNo,$itemID,$quan){
		$data = array(
			'InvoiceNo'=>$invNo,
			'Item_ID'=>$itemID,
			'Quantity'=>$quan
		);
		return $this->db->insert('inv_item',$data);
	}
	
	
	function find($id){
		$this->db->where('id',$id);
		return $this->db->get('product')->row();
	}
}

?>