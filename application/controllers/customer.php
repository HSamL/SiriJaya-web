<?php

class Customer extends CI_Controller{
	
	public function index(){
		$this->load->view('customer/index');
	}
	
	public function add(){
		$this->load->view('customer/Add-form');
	}
	
	public function delete(){
		
	}
	
	public function update(){
		$this->load->view('customer/Update-form');
	}
	
	public function search(){
		
	}
	
	public function view(){
		$data['utype']="customer";
		$this->load->view('quotation/index',$data);
	}
}

?>