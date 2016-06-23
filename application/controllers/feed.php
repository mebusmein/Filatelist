<?php

Class Feed extends CI_Controller {
	
	public function index(){
		$this->load->model('Bid');
        $this->load->model('User');
        $this->load->model('Product');
        $this->load->view('feed');
	}
}

?>