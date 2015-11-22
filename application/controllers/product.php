<?php
class Product extends CI_Controller{
	
	public function index($index = 0){
		$this->load->helper('url');
		$this->load->model('mproduct');
		$data['prodList'] = $this->mproduct->findAll();
		$this->load->view('scart/index',$data);
	} 
}
?>