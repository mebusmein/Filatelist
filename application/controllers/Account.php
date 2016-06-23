<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function index()
    {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $data = [
            "user" => $user
        ];

        $this->load->view('header');
        $this->load->view('pages/account/index',$data);
        $this->load->view('footer');
    }

    public function edit(){
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $data = [
            "user" => $user
        ];

        $this->load->view('header');
        $this->load->view('pages/account/edit',$data);
        $this->load->view('footer');
    }
    
    public function editPost()
    {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $user->username = $this->input->post('username');
        $user->email = $this->input->post('email');
        $user->firstname = $this->input->post('firstname');
        $user->lastname = $this->input->post('lastname');
        $user->address = $this->input->post('address');
        $user->postalcode = $this->input->post('postalcode');
        $user->city = $this->input->post('city');

        $user->save();

        redirect('/account');
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
