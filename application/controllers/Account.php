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

}
