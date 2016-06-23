<?php

Class Feed extends CI_Controller {
	
	public function index(){
		$this->load->model('Bid');
        $this->load->model('User');
        $this->load->model('Product');
        
        $product1 = new Product();
        
        $product1->productName = 'Test1';
        $product1->userID = '948545';
        $product1->createdBy = 'Johnson';
        $product1->description = 'Mooie fiets';
        $product1->startDate = '1-1-1970';
        $product1->startValue = '50';
        $product1->endDate = '31-1-1970';
        $product1->tags = 'fiets';
        $product1->images = '';
        $product1->bids = '';
        
        
        $products = [];
        
        for ($i = 0;$i<20;$i++){
        	$products[] = $product1;
        }
        
        $data = ['products' => $products];
        
        $this->load->view('feed',$data);
	}
}

?>