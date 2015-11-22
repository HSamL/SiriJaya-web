<?php

class Quotation extends CI_Controller{
	
	public function index($utype = 'business'){
		$data['utype']=$utype;
		$this->load->view('quotation/index',$data);
	}
	
	public function request(){
		$this->load->view('quotation/customer/request');
	}
	
	public function update(){
		$this->load->view('quotation/customer/update');
	}
	
	public function review(){
		$this->load->view('quotation/business/review');
	}
	
}

?>