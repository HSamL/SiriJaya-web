<?php
class ShoppingCart extends CI_Controller{
	
	public function buy($id){
		$this->load->model('mproduct');
		$this->load->helper(array('form', 'url'));
		$product = $this->mproduct->find($id);
		$data = array(
        'id'      => $product->id,
        'qty'     => 1,
        'price'   => $product->price,
        'name'    => $product->name
		);

		$this->cart->insert($data);
		$this->load->view('scart/cart');
	} 
	
	
	public function delete($rowid){
		$this->cart->update(array('rowid'=>$rowid,'qty'=>0));
		$this->load->helper(array('form', 'url'));
		$this->load->view('scart/cart');
	}
	
	public function update(){
		$i=1;
		foreach ($this->cart->contents() as $items){
			$this->cart->update(array('rowid'=>$items['rowid'],'qty'=>$_POST['qty'.$i]));
			$i++;
		}
		$this->load->helper(array('form', 'url'));
		$this->load->view('scart/cart');
	}
	
	public function payment($customerID=4){
		$this->load->model('invoice');
		$date['invID']=$this->invoice->getInd();
		$this->load->view('scart/invoice',$data);
	}
	
	public function checkout($customerID=4){
		$this->load->model('invoice');
		$invNo=$this->invoice->getInd();
		$this->invoice->recordInv($invNo,date('Y-m-d'),$customerID);
		$i=1;
		foreach ($this->cart->contents() as $items){
			$this->invoice->recordItems($invNo,$items['id'],$items['qty']);
			$i++;
		}
		$this->cart->destroy();
		$this->load->view('scart/invoice');
	}
}
?>