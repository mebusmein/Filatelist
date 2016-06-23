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
    
    public function profile($id) {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($id);

    	$data['user'] = $user;
    	
    	$this->load->view('header');
    	$this->load->view('pages/profile', $data);
    	$this->load->view('footer');
    }

}
