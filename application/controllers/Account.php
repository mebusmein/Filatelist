<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function index()
    {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $this->load->view('header');
        $this->load->view('pages/account');
        $this->load->view('footer');
    }

    public function edit()
    {
        echo "account aanpassen";
    }
    
    public function profile() {
    	
    	$user1 = new Product();
    	
    	$user1->user_id = '129483';
    	$user1->username = 'Jan39';
    	$user1->firstname = 'Jan';
    	$user1->lastname = 'Vroomshoop';
    	$user1->postalcode = '9448BG';
    	$user1->address = 'Bergersweg 15';
    	$user1->city = 'Amsteldorp';
    	$user1->email = 'jan.vroomshoop@gmail.com';
    	$user1->passwd = 'jvrooms123';
    	
    	$this->load->model('user');
    	# $this->require_min_level(1);
    	//$user = User::find($id);
    	
    	# $data['user'] = $user;
    	$data['user'] = $user1;
    	
    	$this->load->view('header');
    	#$this->load->view('pages/account');
    	$this->load->view('pages/profile', $data);
    	$this->load->view('footer');
    }

}
